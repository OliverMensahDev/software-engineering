process.stdout.write('\u001B[2J\u001B[0;0f');
const server = require("net").createServer();
let counter = 0;
const sockets = {}

server.on("connection", socket => {
  socket.id = counter++;
  sockets[socket.id] = socket;
  console.log("Client connected");
  socket.write(`Welcome client ${socket.id} \n`)

  socket.on("data", data=> {
    // console.log("data is ", data); //no encoding
    // socket.write("data is: ")
    // socket.write(data, 'utf8')  //default encoding

    Object.entries(sockets).forEach(([key, cs ]) => {
      if(key != socket.id){
        cs.write(`${socket.id}  ${data}`);
      }
    })
  })

  socket.setEncoding('utf8')//global encoding

  socket.on("end", ()=>{
    delete sockets[socket.id]
    console.log("Client Disconneted");
  })
});



server.listen(8000, ()=> console.log("Server bound"));
