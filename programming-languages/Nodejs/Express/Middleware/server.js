const express = require('express');
const bootcamps = require('./routes/bootcamps');
const { logger } = require('./middleware/logger');
const app = express();
app.use(logger);
app.use('/api/v1/bootcamps', bootcamps);
app.listen(2000, () => console.log(`Server running on port 2000`));
