const EventEmiiters = require("events");

class Server extends EventEmiiters{
  constructor(client){
    super();
    process.nextTick(() => {
      this.emit(
        "response", 
        "Type command(help to list commands)"
      );
    });
    client.on("command", (command, args)=>{
    // client.on("command", (command)=>{
      //console.log(`Command: ${command}`);
      switch(command){
        // case "help": 
        //   this[command]();
        //   break
        // case "add": 
        //   this[command]();
        //   break
        // case "ls": 
        //   this[command]();
        //   break
        // case "delete": 
        //   this[command]();
        //   break
        // default:
        //   this.emit("response", "Unknown comman d");  
        
        case "help": 
        case "add": 
        case "ls": 
        case "delete": 
          this[command](args);
          break
        default:
          this.emit("response", "Unknown command"); 
      }
    })
  }

  help(){
    this.emit("response", "help...")
  }

  add(args){
    this.emit("response", args.join(" "))
  }

  ls(){
    this.emit("response", "ls...")
  }

  delete(){
    this.emit("response", "delete...")
  }


}

module.exports =  (client) =>  new Server(client);