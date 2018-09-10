class List{
    constructor(){
        this.listSize = 0;
        this.pos = 0;
        this.dataStore = [];
    }

    length(){
        return this.listSize;
    }

    append(element){
        this.dataStore[this.listSize++] = element;   
    }

    toString(){
        return this.dataStore;
    }

    clear() {
        delete this.dataStore;
        this.dataStore = [];
        this.listSize = 0;
    }
}
let list = new List();
list.append(2);
list.append(4);
list.append(5)
console.log(list.toString())