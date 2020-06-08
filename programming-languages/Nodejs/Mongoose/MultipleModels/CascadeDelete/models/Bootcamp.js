const mongoose = require('mongoose');
const slugify = require('slugify');
const BootcampSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true, // no custom error
    unique: true,
    maxlength: [50, 'Name cannot be more than 50'], //custom error
  },
  slug: String, //no validation
});
//Delete courses when a bootcamp is removed 
BootcampSchema.pre('remove', async function (next) {
  await this.model('Course').deleteMany({ bootcamp: this._id });
  next();
});

module.exports = mongoose.model('Bootcamp', BootcampSchema);
