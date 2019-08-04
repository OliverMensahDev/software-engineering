const fs = require("fs");
const server = require("https").createServer({
  key: fs.readFileSync("./key.pem"),
  cert:fs.readFileSync("./cert.pem")
});

server.on("request", (req, res)=> {
  res.writeHead(200, {'content-type': 'text/plain'});
  res.end("Hello World\n"); //terminate
});

server.listen(443);
