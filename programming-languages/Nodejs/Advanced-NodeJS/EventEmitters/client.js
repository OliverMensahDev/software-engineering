const EventEmiiters = require("events");
const readLine = require("readline");

const rl = readLine.createInterface({
  input: process.stdin,
  output: process.stdout
})

const client = new EventEmiiters();
const server = require("./server")(client);

rl.on("line", (input)=>{
  // console.log(input)
  
  // client.emit("command", input);

  const [command, ...args] = input.split(' ');
  client.emit("command", command, args);

})

server.on("response", (resp)=> {
  // console.log(`Response: ${resp}`);
  process.stdout.write('\u001B[2J\u001B[0;0f');
  process.stdout.write(resp);
  process.stdout.write('\n\>');
});