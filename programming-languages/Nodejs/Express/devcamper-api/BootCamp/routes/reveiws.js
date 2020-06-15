const express = require('express');
const {
  getReviews,
  getReview,
  addReview,
  updateReview,
  deleteReview,
} = require('../controllers/reviews');
const advancedResults = require('../middleware/AdvanceResults');
const Review = require('../models/Reviews');
const { protectRoute, authorized } = require('../middleware/auth');

const router = express.Router({
  mergeParams: true,
});
router
  .route('/')
  .get(
    advancedResults(Review, {
      path: 'bootcamp',
      select: 'name description',
    }),
    protectRoute,
    getReviews
  )
  .post(protectRoute, addReview);
router
  .route('/:id')
  .get(getReview)
  .put(protectRoute, updateReview)
  .delete(protectRoute, deleteReview);

module.exports = router;
