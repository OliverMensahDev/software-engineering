function Stack() {
    this.dataStore = [];
    this.top = 0;
    this.push = push;
    this.pop = pop;
    this.peek = peek;
}
//add to stack
function push(element){
    this.dataStore[this.top++] = element;
}
// returns the top element and removes that from stack
function pop(){
    let popped = this.dataStore[--this.top]
    this.dataStore = [...this.dataStore.slice(0, this.top)]
    return popped;
}

// returns the top element 
function peek(){
    return this.dataStore[this.top -1]
}

let stack = new Stack();
stack.push(3)
stack.push(4)
stack.push(5)
stack.push(6)
stack.push(7)
stack.push(8)

var b = stack.pop()
console.log(b)
stack.push(9);
stack.pop()
console.log(stack.dataStore)