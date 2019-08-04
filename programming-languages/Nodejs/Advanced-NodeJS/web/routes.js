const fs = require('fs');
const data = {}
const server =  require("http").createServer();

server.on("request", (req, res)=> {
  switch(req.url){
    case '/api':
      res.writeHead(200, {"Content-Type": "application/json"});
      res.end(JSON.stringify(data))
      break;

    case '/home':
    case '/about':
      res.writeHead(200, {"Content-Type": "text/html"});
      res.end(fs.readFileSync(`.${req.url}.html`));
      break;

    case "/":
      res.writeHead(301, {"Location":"/home"});
      res.end();
      break;

    default:
      res.writeHead(404,  {"Content-Type": "text/html"});
      res.end("<h1 style='text-align:center; margin-top: 50px;'>Page Not Found</h1>");
      break;
  }
})

server.listen(8000)