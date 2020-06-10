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

const router = express.Router({
  mergeParams: true,
});
router.route('/').get(advancedResults(Course), getCourses).post(createCourse);
router.route('/:id').get(getCourse).put(updateCourse).delete(deleteCourse);
module.exports = router;
