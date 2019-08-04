const fs = require('fs');
const path = require("path");

// deleted duplicated data in files
const filesDir = path.join(__dirname, "files");
let files = fs.readdirSync(filesDir);
files.forEach(file => {
  const filePath = path.join(filesDir, file);
  fs.stat(filePath, (err, stats) => {
    if(err) throw err;
    fs.truncate(filePath, Math.floor(stats.size/2), err => {
      if(err) throw err;
    })
  })
})




