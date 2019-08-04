// clean up files older than 3 days.  You dont have access to the data directory.
//seed data before cleaning

const fs = require('fs');
const path = require("path");
const logsDir = path.join(__dirname, "logs");
const ms1Day = 24*60*60*1000;
const files = fs.readdirSync(logsDir);
files.forEach(file => {
  const filePath = path.join(logsDir, file);
  fs.stat(filePath, (err, stats) => {
    if(err) throw err;
    if((Date.now() - stats.mtime.getTime() > 3 * ms1Day)){
      fs.unlink(filePath, err => {
        if(err) throw err;
        console.log(`deleted ${filePath}`)
      })
    }
  })
})


// directory watcher and report on events like file added, removed or deleted;