const mongoose = require('mongoose');
const slugify = require('slugify');
const BootcampSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true, // no custom error
    unique: true,
    maxlength: [50, 'Name cannot be more than 50'], //custom error
  },
  slug: String, //no validation,
  averageCost: Number,
  user: {
    type: mongoose.Schema.ObjectId,
    ref: 'Bootcamp',
    required: true,
  },
});
BootcampSchema.pre('save', function () {
  this.slug = slugify(this.name, { lower: true });
  next();
});

module.exports = mongoose.model('Bootcamp', BootcampSchema);
