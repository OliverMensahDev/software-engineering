const ErrorResponse = require('../utils/ErrorResponse');
const errorHandler = (err, req, res, next) => {
  //specific errors on Mongoose
  let error = { ...err };
  error.message = err.message;
  if (err.name === 'CastError') {
    const message = `BootCamp with id ${err.value} not found`;
    error = new ErrorResponse(message, 404);
  }
  if (err.code === 11000) {
    const message = 'Duplicate field value entered';
    error = new ErrorResponse(message, 400);
  }
  if (err.code === 'ValidationError') {
    const message = Object.values(err.errors).map((val) => val.message);
    error = new ErrorResponse(message, 400);
  }

  res.status(error.statusCode || 500).json({
    success: false,
    error: error.message || 'Server Error',
  });
};

module.exports = errorHandler;
