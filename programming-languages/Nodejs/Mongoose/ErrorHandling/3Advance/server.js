const express = require('express');
const dotenv = require('../4Expert/node_modules/dotenv/types');

//load files
const bootcamps = require('./routes/bootcamps');
dotenv.config({ path: './config/config.env' });
const connectDB = require('./config/db');
const errorHandler = require('./middleware/error');

const app = express();
app.use(express.json());
connectDB();

app.use('/api/v1/bootcamps', bootcamps);
app.use(errorHandler);
app.listen(2000, () => console.log(`Server running on port 2000`));
