function Dictionary(){
    this.add =  add;
    this.dataStore = [];
    //this.dataStore =  new Array();
    this.find = find;
    this.remove =  remove;
}


// This function is used to add a particular key value pair
function add(key,value){
    this.dataStore[key] =  value;
}


// This function is used to remove a key or value
function remove(key){
    delete this.dataStore[key];
}

// This function is used to find a key/value
function find(key){
    return this.dataStore[key];
}

var pbook = new Dictionary();
pbook.add("Mike", "123");
pbook.add("David","345");
pbook.add("Cynthia","456");

// Output 1
console.log("David's extension is "+pbook.find("David"));
console.log("Mike's extension is "+pbook.find("Mike"));
console.log("Cynthia's extension is "+pbook.find("Cynthia"));

// Calling for Remove method

pbook.remove("David");
console.log("David's extension is "+pbook.find("David"));// Output 2

