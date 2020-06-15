const express = require('express');
const {
  getUsers,
  getUser,
  createUser,
  updateUser,
  deleteUser,
} = require('../controllers/users');
const advancedResults = require('../middleware/AdvanceResults');
const User = require('../models/User');
const { protectRoute, authorized } = require('../middleware/auth');

const router = express.Router({
  mergeParams: true,
});
router.use(protectRoute);
router.use(authorized('admin'));
router.route('/').get(advancedResults(User), getUsers).post(createUser);
router.route('/:id').get(getUser).put(updateUser).delete(deleteUser);
module.exports = router;
