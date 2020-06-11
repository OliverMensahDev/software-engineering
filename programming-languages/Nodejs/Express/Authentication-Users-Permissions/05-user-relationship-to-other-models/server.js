const express = require('express');
const dotenv = require('dotenv');
const cookieParser = require('cookie-parser');

//load files
const bootcamps = require('./routes/bootcamps');
const courses = require('./routes/courses');
const auth = require('./routes/auth');

dotenv.config({ path: './config/config.env' });
const connectDB = require('./config/db');
const errorHandler = require('./middleware/error');

const app = express();
app.use(express.json());
app.use(cookieParser());
connectDB();

app.use('/api/v1/bootcamps', bootcamps);
app.use('/api/v1/courses', courses);
app.use('/api/v1/auth', auth);

app.use(errorHandler);
app.listen(3000, () => console.log(`Server running on port 3000`));
