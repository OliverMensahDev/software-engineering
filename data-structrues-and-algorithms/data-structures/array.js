class Arrays{
    constructor(size){
        if(!size) throw new Error("Cannot create an array with empty size")
        if(typeof size != 'number')throw new Error("Size must be a number");
        if(size <=0) throw new Error("Sice cannot be negative or zero");
        this.size = size;
        this.counter = 0;
        this.dataStore = new Array(size);
    }
    insert(value){
        if(this.counter < this.size){
            this.dataStore[this.counter] = value;
            this.counter++;
        }else{
            throw new Error("Index Out of Bound");
        }
    }
    traverse(){
        for(let i = 0; i < this.size; i++){
            console.log(this.dataStore[i]);
        }
    }
    delete(value){
        for(let i = 0; i < this.size; i++){
            if(this.dataStore[i] === value){
                delete this.dataStore[i];
                this.counter--
            }
        }
    }
    update(oldValue, newValue){
        for(let i = 0; i < this.size; i++){
            if(this.dataStore[i] === oldValue){
                this.dataStore[i] = newValue;
                return ;
            }else{
                throw new Error(`${oldValue} does not exist in the array`)
            }
        }
    }
    toString(){
        return JSON.stringify(this.dataStore, null, 3)
    }
    length(){
        return this.counter;
    }
}

let arr = new Arrays(3);
arr.insert(1);
arr.insert(4);
arr.insert(5);
arr.traverse()
arr.delete(5);
// arr.insert(6)

console.log(arr.length())