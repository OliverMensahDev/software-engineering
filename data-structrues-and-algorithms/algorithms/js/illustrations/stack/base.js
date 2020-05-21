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

 function convertNumToBase(num, base){
     let s = new Stack();
     do {
         s.push(num % base);
         num = Math.floor(num / base);
     }
     while(num >0)
     let converted = "";
     while(s.length() > 0){
         converted += s.pop();
     }
     return converted;
 }

 console.log(convertNumToBase(3, 2));
 