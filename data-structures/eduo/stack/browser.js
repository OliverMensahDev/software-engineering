class Stack{
    constructor(){
        this.dataStore = [];
        this.top = 0;
    }    
    push(element){
        this.dataStore[this.top++] = element;
    } 
    pop(){
        let popped = this.dataStore[--this.top]
        this.dataStore = [...this.dataStore.slice(0, this.top)]
        return popped;
    }
    peek(){
        return this.dataStore[this.top -1]
    }  
}

class Browser extends Stack{
    visit(element){
        this.push(element)
    }
    opened(){
        return this.dataStore
    }
    kill(elemen){

    }
}

var browse = new Browser();
browse.visit("Ashesi University")
browse.visit("Marshall University")
browse.visit("Ghana University")
browse.visit("Legon University")
browse.visit("Ashesi University")
console.log(browse.history())