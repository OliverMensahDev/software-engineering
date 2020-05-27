const Bootcamp = require('../models/Bootcamp');
const ErrorResponse = require('../utils/ErrorResponse');
// @desc    Get all bootcamps
// @route   GET /api/v1/bootcamps
// @access  Public
exports.getBootcamps = (req, res, next) => {
  Bootcamp.find()
    .then((data) => {
      res.status(200).json({ success: true, data });
    })
    .catch((err) => {
      next(err);
    });
};

// @desc    Get single bootcamps
// @route   GET /api/v1/bootcamps/:id
// @access  Public
exports.getBootcamp = async (req, res, next) => {
  let id = req.params.id;
  try {
    const bootcamp = await Bootcamp.findById(id);
    if (!bootcamp) {
      return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
    }
    res.status(200).json({ success: true, data: bootcamp });
  } catch (err) {
    next(err);
  }
};

// @desc    Create new bootcamp
// @route   POST /api/v1/bootcamps/
// @access  private
exports.createBootcamp = (req, res, next) => {
  Bootcamp.create(req.body)
    .then((data) => {
      res
        .status(201)
        .json({ success: true, msg: `Create new bootcamp ${data.name}` });
    })
    .catch((err) => {
      next(err);
    });
};

// @desc    Update bootcamp
// @route   PUT /api/v1/bootcamps/:id
// @access  private
exports.updateBootcamp = async (req, res, next) => {
  try {
    const bootcamp = await Bootcamp.findByIdAndUpdate(
      req.params.id,
      {
        name: 'Me',
      },
      {
        new: true,
        runValidators: true,
      }
    );
    if (!bootcamp) {
      if (!bootcamp) {
        return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
      }
    }
    res.status(200).json({ success: true, data: bootcamp });
  } catch (err) {
    next(err);
  }
};

// @desc    Delete bootcamp
// @route   DELETE /api/v1/bootcamps/:id
// @access  private
exports.deleteBootcamp = async (req, res, next) => {
  try {
    const bootcamp = await Bootcamp.findByIdAndDelete(req.params.id);
    if (!bootcamp) {
      if (!bootcamp) {
        return next(new ErrorResponse(`BootCamp with id ${id} not found`, 404));
      }
    }
    res.status(200).json({ success: true });
  } catch (err) {
    next(err);
  }
};
