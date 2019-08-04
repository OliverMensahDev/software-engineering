const server = require("http").createServer();

server.on("request", (req, res)=> {
  res.writeHead(200, {'content-type': 'text/plain'});
  res.write("Hello World\n");// no terminate
  // res.end("Hello World\n"); //terminate

});

server.listen(8000);
