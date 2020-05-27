const express = require('express');
const bootcamps = require('./routes/bootcamps');
const app = express();

app.use('/api/v1/bootcamps', bootcamps);
app.listen(2000, () => console.log(`Server running on port 2000`));
