function Dictionary(){
    this.dataStore = {};
}

Dictionary.prototype.add = function (key, value){
    this.dataStore[key] =  value;
}

Dictionary.prototype.remove = function (key){
    delete this.dataStore[key];
}

Dictionary.prototype.find = function(key){
    return this.dataStore[key];
}

var pbook = new Dictionary();
pbook.add("Mike", "123");
pbook.add("David","345");
pbook.add("Cynthia","456");
console.log(pbook);


// Output 1
console.log("David's extension is "+pbook.find("David"));
console.log("Mike's extension is "+pbook.find("Mike"));
console.log("Cynthia's extension is "+pbook.find("Cynthia"));

// Calling for Remove method
pbook.remove("David");
console.log("David's extension is "+pbook.find("David"));// Output 2

