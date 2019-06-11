const list = [23,4,42,8,16,15];
const qSort = (arr) =>{
  arr = arr.slice()
  if(arr.length == 0) return [];
  let left = [], right = [], pivot = arr[0];
  let newList = arr.slice(1, arr.length);
  for(item of newList){
      item < pivot ? left.push(item) : right.push(item);
  }
  return qSort(left).concat(pivot,qSort(right));
}
console.log(qSort(list));
console.log(list);


