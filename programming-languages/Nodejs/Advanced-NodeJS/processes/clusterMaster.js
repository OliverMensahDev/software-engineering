const cluster = require('cluster');
const os = require("os");

//Mock DB call 
const numberOfUsersInDB = function(){
  this.count = this.count || 5 ;
  this.count = this.count * this.count;
  return this.count;
}

if(cluster.isMaster){
  const totalWorkers = os.cpus().length;

  console.log(`Forking to create ${totalWorkers} workers`);
  for(let i =0; i < totalWorkers; i++){
    cluster.fork();
  }

  const updateWorkers = () => {
    const userCount = numberOfUsersInDB();
    Object.values(cluster.workers).forEach(worker => {
      worker.send({userCount});
    });
  }
  
  updateWorkers()
  setInterval(updateWorkers, 10000)
  
}else{
  require("./clusterServerWork")
}