function isPalindrome(data){
    //remove special 
    var removeChars = data.replace(/[^A-Z0-9]/ig, "").toLowerCase();
    //reverse
    var checkPalindrome = removeChars.split("").reverse().join("");
    return removeChars === checkPalindrome;
}

function isPalindrome1(str){
    if(!str){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    let reverse = str.split('').reverse().join('');
    return reverse === str;
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
    return this.dataStore[--this.top]
}

function peek(){
   return this.dataStore[this.top-1];
}
function length(){
    return this.top;
 }



function isPalindrome2(str){
    let stack = new Stack();
    str = str.toLowerCase();
    for(let i=0; i<str.length; i++){
        stack.push(str[i]);
    }
    let rstr = "";
    while(stack.length() > 0){
        rstr += stack.pop();
    }
    console.log(str)
    console.log(rstr);
    
    return str===rstr;
}

console.log(isPalindrome2("MADAM"));