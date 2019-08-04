process.stdout.write('\u001B[2J\u001B[0;0f');
const server = require("net").createServer();
let counter = 0;
const sockets = {}
function timestamp(){
  const now = new Date();
  return `${now.getHours()}:${now.getMinutes()}`
}
server.on("connection", socket => {
  socket.id = counter++;

  console.log("Client connected");
  socket.write(`Please  type your name: `);

  socket.on("data", data=> {
    if(!sockets[socket.id]){
      socket.name = data.toString().trim();
      socket.write(`Welcome ${socket.name}`)
      sockets[socket.id] = socket; 
      return;
    }
    Object.entries(sockets).forEach(([key, cs ]) => {
      if(key == socket.id)return
      cs.write(`${socket.name} ${timestamp()}:   ${data}`);
    })
  })

  socket.setEncoding('utf8')//global encoding

  socket.on("end", ()=>{
    delete sockets[socket.name]
    console.log("Client Disconneted");
  })
});



server.listen(8000, ()=> console.log("Server bound"));
