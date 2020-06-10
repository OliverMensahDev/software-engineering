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


const router = express.Router();
router.use('/:bootcampId/courses', coursesRouter);
router
  .route('/')
  .get(advancedResults(BootCamp, 'courses'), getBootcamps)
  .post(createBootcamp);
router
  .route('/:id')
  .get(getBootcamp)
  .put(updateBootcamp)
  .delete(deleteBootcamp);

module.exports = router;
