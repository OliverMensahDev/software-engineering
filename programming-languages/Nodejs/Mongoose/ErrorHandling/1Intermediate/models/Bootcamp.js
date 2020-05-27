const mongoose = require('mongoose');

const BootcampSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true, // no custom error
    unique: true,
    maxlength: [50, 'Name cannot be more than 50'], //custom error
  },
  slug: String, //no validation
});

module.exports = mongoose.model('Bootcamp', BootcampSchema);
