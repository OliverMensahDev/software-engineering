

function isSorted(arr){
  for(let i = 1; i < arr.length; i++){
    if(arr[i - 1] > arr[i]) return false
  }
  return true;
}
console.log(isSorted([5,4,3,1]));
console.log(isSorted([1,2,3,4]));

function isSortedImproved(arr){
  let isAscending = true;
  let isDescending = true;
  for(let i =1; i < arr.length; i++){
    let v1 = arr[i -1]
    let v2 = arr[i]
    if(v1 < v2){
      isDescending = false
    }
    if(v1 > v2){
      isAscending = false
    }
  }
  return isAscending || isDescending;
}


console.log(isSortedImproved([5,4,3,1]));
console.log(isSortedImproved([1,2,3,4]));
