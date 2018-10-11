function qSort(arr){
    if(arr.length === 0){
        return [];
    }
    let left = [];
    let right= [] ;
    let pivot = arr[arr.length- 1]
    for( var i = 0; i< arr.length -1; i++){
        arr[i] < pivot ? left.push(arr[i]): right.push(arr[i]);
    }
    return qSort(left).concat(pivot, qSort(right));
}

var a = [];
for( var i = 0; i < 10; i++){
    a[i] = Math.floor(Math.random()*100 +1 )
}

console.log(a)
console.log(qSort(a))
console.log(a);

