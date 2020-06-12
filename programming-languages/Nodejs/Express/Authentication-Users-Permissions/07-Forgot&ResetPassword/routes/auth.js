const express = require('express');
const {
  register,
  login,
  getMe,
  forgotPassword,
  resetPassword,
  updateDetails,
  updatePassword,
} = require('../controllers/auth');
const { protectRoute } = require('../middleware/auth');

const router = express.Router();

router.post('/register', register);
router.post('/login', login);
router.get('/me', protectRoute, getMe);

router.put('/updateDetails', protectRoute, updateDetails);
router.put('/updatePassword', protectRoute, updatePassword);

router.post('/forgotPassword', forgotPassword);
router.put('/resetPassword/:resetToken', resetPassword);

module.exports = router;
