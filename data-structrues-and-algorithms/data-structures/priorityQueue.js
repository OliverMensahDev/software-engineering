class PriorityQueue{
    constructor(){
        this.dataStore = [];
    }
    enqueue(element){
        this.dataStore.push(element);
    }
    dequeue(){
        if(this.dataStore[0].code)
            priority =  this.dataStore[0].code; 
        for (let i = 1; i < this.dataStore.length; ++i) {
            if (this.dataStore[i].code > priority) {
                priority = i;
            } 
        }   
        return this.dataStore.splice(priority,1);
    } 
    front(){
        return this.dataStore[0];
    }
    rear(){
        return this.dataStore[this.dataStore -1]
    }

    isEmpty(){
        this.dataStore.length === 0
    }
    length(){
        this.dataStore.length
    }
    getQueue (){
        this.dataStore
    }
    toString(){
        return JSON.stringify(this.dataStore, null, 3)
    }
}

function Patient(name,code){
    this.name =  name;
    this.code = code;
}

let p = new Patient("Smith");
let ed = new PriorityQueue();
ed.enqueue(p);
p = new Patient("John");
ed.enqueue(p);
p = new Patient("Brown");
ed.enqueue(p);
p= new Patient("Ingram", 1);
ed.enqueue(p);
console.log(ed.toString());

var seen = ed.dequeue();
console.log("Patient being treated:"+ seen[0].name);