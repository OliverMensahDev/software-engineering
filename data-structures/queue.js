class Queue{
    constructor(){
        this.dataStore = [];
    }
    enqueue(element){
        this.dataStore.push(element);
    }
    dequeue(){
        this.dataStore.shift();
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

let q = new Queue();
q.enqueue(3);
q.enqueue(5);
q.enqueue(4);
console.log(q.toString())