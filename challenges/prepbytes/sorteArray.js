//every has predecessor
function isAscending(arr) {
  return arr.every(function (x, i) {
      return i === 0 || x >= arr[i - 1];
  });
}

function isDescending(arr) {
  return arr.every(function (x, i) {
      return i === 0 || x <= arr[i - 1];
  });
}

function imp(arr){
  for(let i=1; i< arr.length; i++){
    if(arr[i] <= arr[i-1]) return false
  }
  return true
}

console.log(imp([1,5,4]))