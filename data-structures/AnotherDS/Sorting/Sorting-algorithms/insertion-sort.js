function CArray(numElements) {
    this.dataStore = [];
    this.pos = 0;
    this.numElements = numElements;
    this.insert = insert;
    this.toString = toString; 
    this.clear = clear;
    this.setData = setData;
    this.swap = swap;
     for (var i = 0; i < numElements; ++i) { 
         this.dataStore[i] = i;
     }
}

function setData() {
    for (var i = 0; i < this.numElements; ++i) {
        this.dataStore[i] = Math.floor(Math.random() *(this.numElements+1));   
    }
}

function clear() {
    for (var i = 0; i < this.dataStore.length; ++i) {
        this.dataStore[i] = 0;
    }
}

function insert(element) {
    this.dataStore[this.pos++] = element; 
}

function toString() {
    var retstr = ""; 
    for (var i = 0; i < this.dataStore.length; ++i) { 
        retstr += this.dataStore[i] + " ";
        if (i > 0 && i % 10 == 0) {
            retstr += "\n";
        }
    } 
return retstr;
}

function swap(arr, index1, index2) {
    var temp = arr[index1]; 
    arr[index1] = arr[index2];
    arr[index2] = temp;
}

function insertionSort(){
    var temp, inner;
    for(var outer=1; outer<=this.dataStore.length-1; ++outer){
        temp = this.dataStore[outer];
        inner = outer;
        while(inner> 0 && (this.dataStore[inner-1] >= temp)){
            this.dataStore[inner] = this.dataStore[inner-1];
            --inner;
        }
        this.dataStore[inner] = temp;
    }
}

var numElements = 5;
var mynums = new CArray(numElements);
mynums.setData();
// 2 3 5 0 1
/*console.log(mynums.toString());
mynums.insertionSort();
console.log();
console.log(mynums.toString());*/
console.log("2 3 5 0 1" );

console.log();
console.log("0 1 2 3 5 ");