const Course = require('../models/Course');
const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
const asyncHandler = require('../middleware/async');

// @desc    Get all courses
// @route   GET /api/v1/courses
// @route   GET /api/v1/bootcamps/:bootcampId/courses
// @access  Public
exports.getCourses = asyncHandler(async (req, res, next) => {
  res.status(200).json(res.advancedResults);
});

// @desc    Get a course
// @route   GET /api/v1/courses/:id
// @access  Public
exports.getCourse = asyncHandler(async (req, res, next) => {
  let course = await Course.findById(req.params.id);
  if (!course) {
    return next(
      new ErrorResponse(`No course with id of ${req.params.id}`, 404)
    );
  }
  res.status(200).json({ success: true, data: course });
});

// @desc    Add course
// @route   POST /api/v1/bootcamp/:bootcampId
// @access  Private
exports.createCourse = asyncHandler(async (req, res, next) => {
  let bootcamp = await Bootcamp.findById(req.params.bootcampId);
  if (!bootcamp) {
    return next(
      new ErrorResponse(`No bootcamp with id of ${req.params.bootcampId}`, 404)
    );
  }
  if (bootcamp.user.toString() != req.user.id || req.user.role != 'admin') {
    return next(
      new ErrorResponse(
        `User with id ${req.user.id} is not authorized to add course to a bootcamp`,
        401
      )
    );
  }
  req.body.bootcamp = req.params.bootcampId;
  req.body.user = req.user.id;
  let course = await Course.create(req.body);
  res.status(201).json({ success: true, data: course });
});

// @desc    Update a course
// @route   PUT /api/v1/course/:id
// @access  Private
exports.updateCourse = asyncHandler(async (req, res, next) => {
  let course = await Course.findById(req.params.id);
  if (!course) {
    return next(
      new ErrorResponse(`No bootcamp with id of ${req.params.id}`, 404)
    );
  }
  if (course.user.toString() != req.user.id || req.user.role != 'admin') {
    return next(
      new ErrorResponse(
        `User with id ${req.user.id} is not authorized to update course`,
        401
      )
    );
  }
  course = await Course.findByIdAndUpdate(req.params.id, req.body, {
    new: true,
    runValidators: true,
  });
  res.status(201).json({ success: true, data: course });
});

// @desc    Update a course
// @route   PUT /api/v1/course/:id
// @access  Private
exports.deleteCourse = asyncHandler(async (req, res, next) => {
  let course = await Course.findById(req.params.id);
  if (!course) {
    return next(
      new ErrorResponse(`No bootcamp with id of ${req.params.id}`, 404)
    );
  }
  if (course.user.toString() != req.user.id || req.user.role != 'admin') {
    return next(
      new ErrorResponse(
        `User with id ${req.user.id} is not authorized to delete course`,
        401
      )
    );
  }
  await course.remove();
  res.status(201).json({ success: true, data: {} });
});
