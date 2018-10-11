function Set(){
    this.dataStore = [];
    this.add = add;
    this.remove = remove;
    this.show =  show;
}

function add(data){
    if(this.dataStore.indexOf(data)<0){
        this.dataStore.push(data);
        return true;
    }
    else{
        return false;
    }
}

function remove(data){
    var pos = this.dataStore.indexOf(data);
    if(pos>-1){
        this.dataStore.splice(pos,1);
        return true;
    }
    else{
        return false;
    }
}


function show(){
    return this.dataStore;
}

var names = new Set();
names.add("David");
names.add("Jennifer");
names.add("Cynthia");
names.add("Mike");
names.add("Raymond");

console.log(names.show());
if(names.add("Mike")){
    console.log("Mike is added in my set list"); // Output 
}
else {
    console.log("Cant add Mike, must already be in set");
}

console.log(names.show());
var removed = "Mike";
if(names.remove(removed)){
    console.log(removed+ " is removed from set");
}
else {
    console.log(removed+ " is not removed from set");
}


names.add("Clayton");
console.log(names.show());
var removed = "Alisha";
if(names.remove("Alisha")){
    console.log("The element is removed");
}
else{
    console.log("The element is not removed or it is not present in the Set");
}
