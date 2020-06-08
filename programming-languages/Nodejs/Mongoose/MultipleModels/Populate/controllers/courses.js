const Course = require('../models/Course');
const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
const asyncHandler = require('../middleware/async');

// @desc    Get all courses
// @route   GET /api/v1/courses
// @route   GET /api/v1/bootcamps/:bootcampId/courses
// @access  Public
exports.getCourses = asyncHandler(async (req, res, next) => {
  let query;
  if (req.params.bootcampId) {
    query = Course.find({ bootcamp: req.params.bootcampId });
  } else {
    // query = Course.find().populate('bootcamp');
    query = Course.find().populate({
      path: 'bootcamp',
      select: 'name',
    });
  }
  const courses = await query;
  res.status(200).json({ success: true, data: courses });
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
  req.body.bootcamp = req.params.bootcampId;
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
  await course.remove();
  res.status(201).json({ success: true, data: {} });
});
