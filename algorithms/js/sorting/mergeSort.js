var called = 0
function merge(left, right){
    console.log("called "+ ++called);
    console.log(left, right)
    var result = [];
    var lLen = left.length, 
        rLen = right.length,
        l = 0, 
        r=0;
    while( l < lLen && r < rLen){
        if( left[l] < right[r]){
            result.push(left[l++])
        }else{
            result.push(right[r++])
        }
    }
    console.log(result.concat(left.slice(l).concat(right.slice(r))))
    return result.concat(left.slice(l).concat(right.slice(r)))
}
var calledHere = 0
function mergeSort(arr){
    console.log("calledHere "+ ++calledHere)
    var len = arr.length;
    if(len < 2){
        return arr;
    }
    var mid = Math.floor(len/2),
        left = arr.slice(0, mid),
        right = arr.slice(mid);
    console.log(mid)
    console.log("Left: "+left)
    console.log("right: " +right)
    return merge(mergeSort(left), mergeSort(right));
}


var arr =[1,2,10, 0, 3, 5];
console.log(mergeSort(arr));