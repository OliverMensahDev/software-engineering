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

function factorial(n){
    let stack = new Stack();
    while(n > 1){
        stack.push(n--)
    }

    let product = 1 ;
    while(stack.top > 0){
        product *= stack.pop();
    }

    return product;
}

console.log(factorial(5))