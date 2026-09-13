const fs = require('fs');
const path = require('path');

const STORE_PATH = path.join(__dirname, 'db_store.json');

const DEFAULT_STORE = {
  enrollments: {
    'student-alex-id': [
      'course-programming-foundations',
      'course-python-foundations'
    ]
  },
  lesson_progress: {
    'student-alex-id': {
      'lesson-pf-1-1': { completed: true, status: 'completed', completed_at: new Date().toISOString() }
    }
  },
  user_progress: {
    'student-alex-id': {
      'course-programming-foundations': {
        user_id: 'student-alex-id',
        course_id: 'course-programming-foundations',
        completed_lessons: ['lesson-pf-1-1'],
        percentage: 4,
        last_accessed: new Date().toISOString()
      }
    }
  },
  exam_attempts: {
    'student-alex-id': {}
  },
  gamification: {
    'student-alex-id': {
      total_xp: 450,
      current_streak: 5,
      longest_streak: 12,
      last_activity_date: new Date().toISOString().slice(0, 10)
    }
  }
};

function readStore() {
  try {
    if (!fs.existsSync(STORE_PATH)) {
      writeStore(DEFAULT_STORE);
      return DEFAULT_STORE;
    }
    const raw = fs.readFileSync(STORE_PATH, 'utf8');
    const store = JSON.parse(raw);
    if (!store.enrollments) store.enrollments = DEFAULT_STORE.enrollments;
    if (!store.lesson_progress) store.lesson_progress = DEFAULT_STORE.lesson_progress;
    if (!store.user_progress) store.user_progress = DEFAULT_STORE.user_progress;
    if (!store.exam_attempts) store.exam_attempts = DEFAULT_STORE.exam_attempts;
    if (!store.gamification) store.gamification = DEFAULT_STORE.gamification;
    return store;
  } catch (e) {
    console.error('Error reading db_store.json:', e);
    return DEFAULT_STORE;
  }
}

function writeStore(data) {
  try {
    fs.writeFileSync(STORE_PATH, JSON.stringify(data, null, 2), 'utf8');
  } catch (e) {
    console.error('Error writing db_store.json:', e);
  }
}

// Helper to determine course id from lesson id if not explicitly passed
function resolveCourseIdForLesson(lessonId) {
  if (!lessonId) return 'course-programming-foundations';
  const low = String(lessonId).toLowerCase();
  if (low.startsWith('lesson-pyl2-') || low.includes('pyl2') || low.includes('python-level-2')) return 'course-python-level-2';
  if (low.startsWith('lesson-pyf-') || low.includes('python')) return 'course-python-foundations';
  return 'course-programming-foundations';
}

module.exports = {
  getEnrollments(userId = 'student-alex-id') {
    const store = readStore();
    if (!store.enrollments[userId]) {
      store.enrollments[userId] = [];
      writeStore(store);
    }
    return store.enrollments[userId];
  },

  enrollUser(userId = 'student-alex-id', courseId) {
    if (!courseId) return;
    const store = readStore();
    if (!store.enrollments[userId]) store.enrollments[userId] = [];
    if (!store.enrollments[userId].includes(courseId)) {
      store.enrollments[userId].push(courseId);
      writeStore(store);
    }
  },

  getLessonProgress(userId = 'student-alex-id') {
    const store = readStore();
    return store.lesson_progress[userId] || {};
  },

  getUserProgress(userId = 'student-alex-id', courseId) {
    const store = readStore();
    if (!store.user_progress) store.user_progress = {};
    if (!store.user_progress[userId]) store.user_progress[userId] = {};
    if (courseId) {
      return store.user_progress[userId][courseId] || {
        user_id: userId,
        course_id: courseId,
        completed_lessons: [],
        percentage: 0,
        last_accessed: new Date().toISOString()
      };
    }
    return store.user_progress[userId];
  },

  getAllUserProgress(userId = 'student-alex-id') {
    const store = readStore();
    if (!store.user_progress) store.user_progress = {};
    return store.user_progress[userId] || {};
  },

  saveUserProgress(userId = 'student-alex-id', courseId, completedLessons = [], percentage = 0) {
    if (!courseId) return null;
    const store = readStore();
    if (!store.user_progress) store.user_progress = {};
    if (!store.user_progress[userId]) store.user_progress[userId] = {};

    const progressRecord = {
      user_id: userId,
      course_id: courseId,
      completed_lessons: Array.isArray(completedLessons) ? Array.from(new Set(completedLessons)) : [],
      percentage: Number(percentage) || 0,
      last_accessed: new Date().toISOString()
    };

    store.user_progress[userId][courseId] = progressRecord;

    // Also sync to lesson_progress map
    if (!store.lesson_progress[userId]) store.lesson_progress[userId] = {};
    progressRecord.completed_lessons.forEach(lid => {
      if (lid) {
        store.lesson_progress[userId][lid] = {
          completed: true,
          status: 'completed',
          completed_at: progressRecord.last_accessed
        };
      }
    });

    writeStore(store);
    return progressRecord;
  },

  isLessonCompleted(userId = 'student-alex-id', lessonId) {
    if (!lessonId) return false;
    const map = this.getLessonProgress(userId);
    return !!(map[lessonId] && map[lessonId].completed);
  },

  completeLesson(userId = 'student-alex-id', lessonId, xpReward = 25, explicitCourseId = null) {
    if (!lessonId) return { already_completed: false, total_xp: 450, streak: 5 };
    const store = readStore();
    if (!store.lesson_progress[userId]) store.lesson_progress[userId] = {};
    if (!store.user_progress) store.user_progress = {};
    if (!store.user_progress[userId]) store.user_progress[userId] = {};

    const alreadyCompleted = !!(store.lesson_progress[userId][lessonId] && store.lesson_progress[userId][lessonId].completed);

    store.lesson_progress[userId][lessonId] = {
      completed: true,
      status: 'completed',
      completed_at: new Date().toISOString()
    };

    // Calculate course progress & update user_progress table
    const courseId = explicitCourseId || resolveCourseIdForLesson(lessonId);
    
    // Auto-enroll user in course if not yet enrolled
    if (!store.enrollments[userId]) store.enrollments[userId] = [];
    if (!store.enrollments[userId].includes(courseId)) {
      store.enrollments[userId].push(courseId);
    }

    // Aggregate completed lessons for this course
    const existingCourseProgress = store.user_progress[userId][courseId] || {
      user_id: userId,
      course_id: courseId,
      completed_lessons: [],
      percentage: 0
    };

    const completedLessonsSet = new Set(existingCourseProgress.completed_lessons || []);
    completedLessonsSet.add(lessonId);
    const completedLessonsArr = Array.from(completedLessonsSet);

    // Estimate total lessons (default 50 lessons + 10 exams per standard 10-chapter course)
    const estimatedTotal = 50;
    const computedPercentage = Math.min(100, Math.round((completedLessonsArr.length / estimatedTotal) * 100));

    const updatedUserProgress = {
      user_id: userId,
      course_id: courseId,
      completed_lessons: completedLessonsArr,
      percentage: computedPercentage,
      last_accessed: new Date().toISOString()
    };
    store.user_progress[userId][courseId] = updatedUserProgress;

    if (!store.gamification[userId]) {
      store.gamification[userId] = { total_xp: 450, current_streak: 5, longest_streak: 12, last_activity_date: new Date().toISOString().slice(0, 10) };
    }

    const gam = store.gamification[userId];
    let xpEarned = 0;
    if (!alreadyCompleted) {
      xpEarned = xpReward || 25;
      gam.total_xp = (gam.total_xp || 0) + xpEarned;

      const today = new Date().toISOString().slice(0, 10);
      if (gam.last_activity_date !== today) {
        gam.current_streak = (gam.current_streak || 1) + 1;
        gam.last_activity_date = today;
      }
    }

    writeStore(store);

    return {
      already_completed: alreadyCompleted,
      xp_earned: xpEarned,
      total_xp: gam.total_xp,
      streak: gam.current_streak,
      user_progress: updatedUserProgress
    };
  },

  getExamAttempts(userId = 'student-alex-id', examOrChapterId) {
    const store = readStore();
    const userAttempts = store.exam_attempts[userId] || {};
    return userAttempts[examOrChapterId] || [];
  },

  getHighestExamScore(userId = 'student-alex-id', examOrChapterId) {
    const attempts = this.getExamAttempts(userId, examOrChapterId);
    if (!attempts || attempts.length === 0) return null;
    return Math.max(...attempts.map(a => a.score || 0));
  },

  recordExamAttempt(userId = 'student-alex-id', examOrChapterId, score, passed, gradedAnswers) {
    const store = readStore();
    if (!store.exam_attempts[userId]) store.exam_attempts[userId] = {};
    if (!store.exam_attempts[userId][examOrChapterId]) store.exam_attempts[userId][examOrChapterId] = [];

    const existing = store.exam_attempts[userId][examOrChapterId];
    if (existing.length >= 3) {
      throw new Error('Maximum 3 attempts limit reached for this chapter exam.');
    }

    const attemptNumber = existing.length + 1;
    const attemptRecord = {
      attempt_id: 'att-' + Date.now() + '-' + Math.random().toString(36).substring(2, 7),
      attempt_number: attemptNumber,
      score: score,
      passed: !!passed,
      answers: gradedAnswers,
      completed_at: new Date().toISOString()
    };

    existing.push(attemptRecord);

    const allScores = existing.map(a => a.score);
    const highestScore = Math.max(...allScores);

    let xpEarned = 0;
    if (passed && !existing.slice(0, -1).some(a => a.passed)) {
      xpEarned = 50;
      if (!store.gamification[userId]) {
        store.gamification[userId] = { total_xp: 450, current_streak: 5, longest_streak: 12, last_activity_date: new Date().toISOString().slice(0, 10) };
      }
      store.gamification[userId].total_xp = (store.gamification[userId].total_xp || 0) + 50;
    }

    writeStore(store);

    return {
      attempt: attemptRecord,
      attempts_used: existing.length,
      attempts_left: Math.max(0, 3 - existing.length),
      highest_score: highestScore,
      xp_earned: xpEarned
    };
  },

  getGamification(userId = 'student-alex-id') {
    const store = readStore();
    return store.gamification[userId] || { total_xp: 450, current_streak: 5, longest_streak: 12, level: 5 };
  }
};
