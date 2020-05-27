const express = require('express');
const dotenv = require('dotenv');

//load files
const bootcamps = require('./routes/bootcamps');
dotenv.config({ path: './config/config.env' });
const connectDB = require('./config/db');

const app = express();
app.use(express.json());
connectDB();

app.use('/api/v1/bootcamps', bootcamps);
app.listen(2000, () => console.log(`Server running on port 2000`));
