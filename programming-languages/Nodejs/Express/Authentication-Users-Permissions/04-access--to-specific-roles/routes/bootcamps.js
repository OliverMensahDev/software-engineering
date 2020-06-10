const express = require('express');
const {
  getBootcamps,
  getBootcamp,
  createBootcamp,
  updateBootcamp,
  deleteBootcamp,
} = require('../controllers/bootcamps');
const coursesRouter = require('./courses');
const advancedResults = require('../middleware/AdvanceResults');
const BootCamp = require('../models/Bootcamp');
const { protectRoute, authorized } = require('../middleware/auth');

const router = express.Router();
router.use('/:bootcampId/courses', coursesRouter);
router
  .route('/')
  .get(advancedResults(BootCamp, 'courses'), getBootcamps)
  .post(protectRoute, authorized('publisher', 'admin'), createBootcamp);
router
  .route('/:id')
  .get(getBootcamp)
  .put(protectRoute, authorized('publisher', 'admin'), updateBootcamp)
  .delete(protectRoute, authorized('publisher', 'admin'), deleteBootcamp);

module.exports = router;
