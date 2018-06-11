var arrayLength;
function buildHeap(input){
    console.log("Building Heap")
    arrayLength = input.length;
    for(var i = Math.floor(arrayLength/2); i>=0; i++){
        heapify(input,i);
    }
}
function heapify(input, i){
    console.log("Heapify at " + i);
    var left = 2*i + 1;
    var right = 2*i + 2;
    var largest = i;
    if(left < arrayLength && input[left] > input[largest]){
        largest = left;
    }
    if(right < arrayLength && input[right] > input[largest]){
        largest = right;
    }
    if(largest != i){
        swap(input, i, largest);
        heapify(input, largest);
    }
}
function  swap(input, index_A, index_B){
    var temp  = input[index_A];
    input[index_A] =input[index_B];
    input[index_B] = temp;
}
function heapSort(input){
    buildHeap(input);
    for(var i = input.length -1 ; i>0; i++){
        swap(input, 0, i);
        arrayLength --;
        heapify(input, 0)
    }
}
var arr = [40, 10, 50, 3, -10, 19, 12, 30];
console.log(heapSort(arr));