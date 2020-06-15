const Review = require('../models/Reviews');
const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
const asyncHandler = require('../middleware/async');

// @desc    Get all reviews
// @route   GET /api/v1/reviews
// @route   GET /api/v1/bootcamps/:bootcampId/reviews
// @access  Public
exports.getReviews = asyncHandler(async (req, res, next) => {
  // if (req.params.bootcampId) {  //moved to advancedresults
  //   const courses = await Review.find({ bootcamp: req.params.bootcampId });
  //   return res.status(200).json({
  //     success: true,
  //     count: courses.length,
  //     data: courses,
  //   });
  // } else {
  //   res.status(200).json(res.advancedResults);
  // }
  res.status(200).json(res.advancedResults);
});

// @desc    Get single review
// @route   GET /api/v1/reviews/:id
// @access  Public
exports.getReview = asyncHandler(async (req, res, next) => {
  let id = req.params.id;
  const review = await Review.findById(id);
  if (!review) {
    return next(new ErrorResponse(`Review with id ${id} not found`, 404));
  }
  res.status(200).json({ success: true, data: review });
});
// @desc    Create a review
// @route   POST /api/v1/bootcamps/:bootcampId/reviews
// @access  Private
exports.addReview = asyncHandler(async (req, res, next) => {
  const bootcamp = await Bootcamp.findById(req.params.bootcampId);
  if (!bootcamp) {
    return next(
      new ErrorResponse(`No bootcamp with the id of ${req.params.bootcampId}`)
    );
  }
  req.body.bootcamp = req.params.bootcampId;
  req.body.user = req.user.id;
  const review = await Review.create(req.body);
  res.status(201).json({
    success: true,
    data: review,
  });
});

// @desc    Create a review
// @route   POST /api/v1/bootcamps/:bootcampId/reviews
// @access  Private
exports.addReview = asyncHandler(async (req, res, next) => {
  const bootcamp = await Bootcamp.findById(req.params.bootcampId);
  if (!bootcamp) {
    return next(
      new ErrorResponse(`No bootcamp with the id of ${req.params.bootcampId}`)
    );
  }
  req.body.bootcamp = req.params.bootcampId;
  req.body.user = req.user.id;
  const review = await Review.create(req.body);
  res.status(201).json({
    success: true,
    data: review,
  });
});

// @desc    Update a review
// @route   PUT /api/v1/reviews/:id
// @access  Private
exports.updateReview = asyncHandler(async (req, res, next) => {
  let review = await Review.findById(req.params.id);
  if (!review) {
    return next(
      new ErrorResponse(`No review with the id of ${req.params.id}`, 404)
    );
  }
  if (review.user.toString() != req.user.id) {
    return next(
      new ErrorResponse(
        `You are not authorized to update the review with the id of ${req.params.id}`,
        401
      )
    );
  }
  review = await Review.findByIdAndUpdate(req.params.id, req.body, {
    new: true,
    runValidators: true,
  });
  res.status(201).json({
    success: true,
    data: review,
  });
});

// @desc    Delete a review
// @route   Delete /api/v1/reviews/:id
// @access  Private
exports.deleteReview = asyncHandler(async (req, res, next) => {
  const review = await Review.findById(req.params.id);
  if (!review) {
    return next(
      new ErrorResponse(`No review with the id of ${req.params.id}`, 404)
    );
  }
  if (review.user.toString() != req.user.id) {
    return next(
      new ErrorResponse(
        `You are not authorized to update the review with the id of ${req.params.id}`,
        401
      )
    );
  }
  await Review.findByIdAndDelete(req.params.id);
  res.status(201).json({
    success: true,
    data: {},
  });
});
