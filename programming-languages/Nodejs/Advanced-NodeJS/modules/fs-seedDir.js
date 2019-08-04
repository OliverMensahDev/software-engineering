const fs = require('fs');
const path = require("path");
const  logsDir = path.join(__dirname, "logs");
fs.mkdirSync(logsDir);
const ms1Day = 24*60*60*1000;
for(let i =0; i< 10; i++){
  const filePath = path.join(logsDir, `file${i}`);
  fs.writeFile(filePath, i, err =>{
    if(err) throw err;  
    const time = (Date.now() - i *ms1Day) /1000;
    fs.utimes(filePath, time, time, (err) => {
      if(err) throw err;
    })
  });
}