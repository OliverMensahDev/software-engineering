const fs = require("fs");
const server = require("http").createServer();
server.on("request", (req, res)=> {
  //batching

  // fs.readFile("./big.file", (err, data)=> {
  //   if(err) throw err;
  //   res.end(data);
  // })

  //streaming

  const src = fs.createReadStream("./big.file");
  src.pipe(res);
})

server.listen(8000)