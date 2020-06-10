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
const { protectRoute } = require('../middleware/auth');

const router = express.Router({
  mergeParams: true,
});
router
  .route('/')
  .get(advancedResults(Course), getCourses)
  .post(protectRoute, createCourse);
router
  .route('/:id')
  .get(getCourse)
  .put(protectRoute, updateCourse)
  .delete(protectRoute, deleteCourse);
module.exports = router;
