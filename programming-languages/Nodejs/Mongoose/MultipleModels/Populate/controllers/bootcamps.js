const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
const asyncHandler = require('../middleware/async');

// @desc    Get all bootcamps
// @route   GET /api/v1/bootcamps
// @access  Public
exports.getBootcamps = asyncHandler(async (req, res, next) => {
  let query = Bootcamp.find();
  //paginate
  const page = parseInt(req.query.page, 10) || 1;
  const limit = parseInt(req.query.limit, 10) || 10;
  const startIndex = (page - 1) * limit;
  const endIndex = page * limit;
  const total = await Bootcamp.countDocuments();

  query = query.skip(startIndex).limit(limit);
  const paginationRes = {};
  if (endIndex < total) {
    paginationRes.next = {
      page: page + 1,
      limit: limit,
    };
  }
  if (startIndex > 0) {
    paginationRes.prev = {
      page: page - 1,
      limit,
    };
  }
  //select
  if (req.query.select) {
    const fields = req.query.select.split(',').join(' ');
    query = query.select(fields);
  }
  //Sort
  if (req.query.sort) {
    const fields = req.query.sort.split(',').join(' ');
    query = query.sort(fields);
  }
  const bootcamps = await query;

  res
    .status(200)
    .json({ success: true, data: bootcamps, pagination: paginationRes });
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
