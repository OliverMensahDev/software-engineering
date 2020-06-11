const express = require('express');
const {
  getCourses,
  getCourse,
  createCourse,
  updateCourse,
  deleteCourse,
} = require('../controllers/courses');
const advancedResults = require('../middleware/AdvanceResults');
const Course = require('../models/Course');
const { protectRoute, authorized } = require('../middleware/auth');

const router = express.Router({
  mergeParams: true,
});
router
  .route('/')
  .get(advancedResults(Course), getCourses)
  .post(protectRoute, authorized('publisher', 'admin'), createCourse);
router
  .route('/:id')
  .get(getCourse)
  .put(protectRoute, authorized('publisher', 'admin'), updateCourse)
  .delete(protectRoute, authorized('publisher', 'admin'), deleteCourse);
module.exports = router;
