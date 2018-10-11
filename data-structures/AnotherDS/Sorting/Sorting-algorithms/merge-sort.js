function CArray(numElements) {
    this.dataStore = [];
    this.pos = 0;
    this.numElements = numElements;
    this.insert = insert;
    this.toString = toString; 
    this.clear = clear;
    this.setData = setData;
    this.swap = swap;
    this.mergeSort = mergeSort;
    this.mergeArrays =  mergeArrays;
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

function mergeArrays(arr,startLeft,stopLeft, startRight, stopRight){
    var rightArr = new Array(stopRight- startRight+1);
    var leftArr = new Array(stopLeft- startLeft+1);
    k= startRight;
    for(var i=0; i <(rightArr.length-1); i++){
        rightArr[i] = arr[k];
        ++k;
    }

    k= startLeft;
    for(var i=0; i <(leftArr.length-1); i++){
        leftArr[i] = arr[k];
        ++k;
    }

    rightArr[rightArr.length-1] = Infinity; // a sentinel value
    leftArr[leftArr.length-1] = Infinity; // a sentinal value
    var m=0; var n=0;
    for(var k= startLeft; k<stopRight ; ++k){
        if(leftArr[m] <= rightArr[m]){
        arr[k] = leftArr[m];
        m++;
        }
        else{
            arr[k] = rightArr[n];
            n++;
        }
    }  
    console.log("left array -"+leftArr); 
    console.log("right array -"+ rightArr);
}

function mergeSort(){
    if(this.dataStore.length<2){
        return;
    }

    var step = 1;

    var left, right;
    while(step < this.dataStore.length){
        left = 0;
        right = step;
        while(right+step <= this.dataStore.length){
            mergeArrays(this.dataStore,left,left+step, right, right+step);
            left = right+step;
            right = left+step;
        }
        if (right < this.dataStore.length){
            mergeArrays(this.dataStore, left, left+step, right, this.dataStore.length);
        }
        step *=2;
    }
}

var numElements = 10;
var mynums = new CArray(numElements);
mynums.setData();
console.log(mynums.toString());
mynums.mergeSort();
console.log(mynums.toString());