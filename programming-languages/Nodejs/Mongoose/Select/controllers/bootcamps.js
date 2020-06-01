const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
const asyncHandler = require('../middleware/async');

// @desc    Get all bootcamps
// @route   GET /api/v1/bootcamps
// @access  Public
exports.getBootcamps = asyncHandler(async (req, res, next) => {
  let query = Bootcamp.find();
  if (req.query.select) {
    const fields = req.query.select.split(',').join(' ');
    query = query.select(fields);
  }
  const bootcamps = await query;

  res.status(200).json({ success: true, data: bootcamps });
});

// @desc    Get single bootcamps
// @route   GET /api/v1/bootcamps/:id
// @access  Public
exports.getBootcamp = asyncHandler(async (req, res, next) => {
  let id = req.params.id;
  const bootcamp = await Bootcamp.findById(id);
  if (!bootcamp) {
    return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
  }
  res.status(200).json({ success: true, data: bootcamp });
});

// @desc    Create new bootcamp
// @route   POST /api/v1/bootcamps/
// @access  private
exports.createBootcamp = asyncHandler(async (req, res, next) => {
  const bootcamp = await Bootcamp.create(req.body);
  res
    .status(201)
    .json({ success: true, msg: `Create new bootcamp ${bootcamp.name}` });
});

// @desc    Update bootcamp
// @route   PUT /api/v1/bootcamps/:id
// @access  private
exports.updateBootcamp = asyncHandler(async (req, res, next) => {
  let id = req.params.id;
  const bootcamp = await Bootcamp.findByIdAndUpdate(
    id,
    {
      name: req.body.name,
    },
    {
      new: true,
      runValidators: true,
    }
  );
  if (!bootcamp) {
    return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
  }
  res.status(200).json({ success: true, data: bootcamp });
});

// @desc    Delete bootcamp
// @route   DELETE /api/v1/bootcamps/:id
// @access  private
exports.deleteBootcamp = asyncHandler(async (req, res, next) => {
  let id = req.params.id;
  const bootcamp = await Bootcamp.findByIdAndDelete(id);
  if (!bootcamp) {
    return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
  }
  res.status(200).json({ success: true });
});
