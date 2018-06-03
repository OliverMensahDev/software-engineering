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

function isPalindrome(word){
    let stack = new Stack();
    for(let i =0; i< word.length; i++){
        stack.push(word[i])
    }
    rword = ''
    while(stack.top > 0){
        rword += stack.pop()
    }

    if(word == rword){
        return true;
    }else{
        return false;
    }
}

console.log(isPalindrome('madam'))