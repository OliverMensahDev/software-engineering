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

// Another Version from My CodePlayGround
const list = [3, 1, 30, 4];
const qSort = list => {
  if(list.length === 0 ) return [];
  let pivot = list[0], left=[], right =[];
  let newList = list.slice(1, list.length);
  for(number of newList){
    number < pivot ? left.push(number) : right.push(number)
  }
  return qSort(left).concat(pivot, qSort(right))
}

console.log(list);
console.log(qSort(list));
console.log(list);



