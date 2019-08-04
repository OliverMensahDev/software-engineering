const fs = require("fs");
const readFileAsArray = function(file, cb = () => {}){
  return new Promise((resolve, reject) => {
    fs.readFile(file, function(err, data) {
      if(err){
        reject(err);
        return cb(err)
      } 
      const lines = data.toString().trim().split("\n");
      resolve(lines);
      return cb(null, lines);  
    })
  })
}

async function countOdd(){
  try{
    const lines = await readFileAsArray("./numbers");
    const numbers = lines.map(Number);
    const oddNumbers = numbers.filter(number => number %2 === 1);
    console.log("Old numbers count: ", oddNumbers.length);
  }
  catch(err) {
    console.error(err)
  } 
}

countOdd()