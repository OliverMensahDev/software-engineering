function factorial(num){
    if(num ==1) return num;
    else return num * factorial(num-1);
}


//with stack 
function Stack(){
    this.dataStore = [];
    this.top  = 0;
    this.push = push;
    this.pop = pop;
    this.peek = peek;
    this.length = length;
}

function push(element){
    this.dataStore[this.top++] = element;
}

function pop(){
    //any better way
    return this.dataStore[--this.top]
}

function peek(){
   return this.dataStore[this.top-1];
}
function length(){
    return this.top;
 }

function factorial2(num){
    let stack = new Stack();

    while(num > 1){
        stack.push(num--)
    }
    let product = 1;
    while(stack.length() > 0){
        product *= stack.pop();
    }
    return product;
}

console.log(factorial2(4));