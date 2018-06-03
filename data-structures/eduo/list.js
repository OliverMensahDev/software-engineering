function List() {
    this.listSize = 0 ;
    this.pos = 0;
    this.dataStore = [];
    this.toString = toString;
    this.append = append;
    this.remove = remove;
    this.length = length
    this.clear = clear;
}

function length() {
    return this.listSize;
}

function append(element){
    this.dataStore[this.listSize++] = element
}

function remove(element){
    for(let i = 0; i< this.length(); i++){
        if(this.dataStore[i] == element){
          this.dataStore = [...this.dataStore.slice(0, i), ...this.dataStore.slice(i +1)]
        }
    }
    
}

function toString() {
    return this.dataStore;
}

function clear(){
    delete this.dataStore;
    this.dataStore = [];
    this.listSize = 0;
}

var names = new List();
names.append("Oliver");
names.append("Oliver1");
names.append("Oliver2");
names.append("Oliver3");
names.remove("Oliver");
console.log(names.toString());
