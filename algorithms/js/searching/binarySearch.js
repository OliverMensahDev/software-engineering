function binSearch(arr, data){
    var upperBound = arr.length -1 ;
    var lowerBound = 0;
    while(lowerBound <= upperBound){
        var mid = Math.floor((upperBound+lowerBound)/2);
        if(arr[mid] < data){
            lowerBound = mid + 1;
        }else if(arr[mid]> data){
            upperBound = mid -1 
        }
        else{
            return mid
        }
    }
    return -1 
}

console.log(binSearch([1,2,4,6,20, 30], 6));


function binarySearch(items, value) {
  var startIndex = 0,
    stopIndex = items.length - 1,
    middle = Math.floor((startIndex + stopIndex) / 2);
  while (items[middle] != value && startIndex < stopIndex) {
    if (value < items[middle]) {
      stopIndex = middle - 1;
    } else if (value > items[middle]) {
      startIndex = middle + 1;
    }
    middle = Math.floor((startIndex + stopIndex) / 2);
  }
  return (items[middle] != value) ? " not found" : middle;
}
var items = [2, 4, 45, 67, 90, 9];
console.log(binarySearch(items, 8));
console.log(binarySearch(items, 2));
