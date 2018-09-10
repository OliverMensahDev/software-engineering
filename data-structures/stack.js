class Stack{
    constructor(){
        this.dataStore = [];
        this.top = 0;
    }
    push(element){
        this.dataStore[this.top++] = element
    }
    pop(){
        return this.dataStore.splice(--this.top, 1)
    };
    peek(){  
       return this.dataStore[this.top - 1]
    }
    length(){
       return this.top;
    }
    isEmpty(){
        this.top === 0
    }
    getStack(){
        return this.dataStore;
    }
    toString(){
        return JSON.stringify(this.dataStore, null, 3)
    }
} 