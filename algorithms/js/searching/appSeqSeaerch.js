function findMin(arr){
    var min= arr[0];
    for(var i=1; i< arr.length; i++){
        if(arr[i]<min){
            min = arr[i]
        }
    }
    return min;
}

console.log(findMin([1,0, 3, 9, -1]));

function findMax(arr){
    var max = arr[0];
    for(var i=1; i< arr.length; i++){
        if(arr[i]> max){
            max = arr[i]
        }
    }
    return max;
}
console.log(findMax([1,0, 3, 9, -1]));
