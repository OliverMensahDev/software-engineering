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
console.log("First Binary Search Implementation")
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
console.log("Second Binary Search Implementation")
var items = [2, 4, 45, 67, 90, 9];
console.log(binarySearch(items, 8));
console.log(binarySearch(items, 2));

 /**
 * Given a sorted array of numbers, find if a given number ‘key’ is present in the array. 
 * Though we know that the array is sorted, we don’t know if it’s sorted in ascending or descending order. 
 * You should assume that the array can have duplicates.
 * Write a function to return the index of the ‘key’ if it is present in the array, otherwise return -1.
 */
  function binarySearch(arr, key){
    let start = 0;
    let end = arr.length -1;
    let isAscending = arr[start] < arr[end];
    while(start <= end){
        let mid = Math.floor(start + (end - start) / 2);
        if(key == arr[mid]) return mid;
        if(isAscending){
            if(key > arr[mid]){
                start = mid + 1;
            }else{
                end = mid - 1;
            }
        }else{
            if(key > arr[mid]){
                end = mid - 1;
            }else{
                start = mid + 1;
            }
        }
    }
    return -1;
}
console.log("Third Binary Search Implementation")
console.log(binarySearch([4, 6, 10], 10));
console.log(binarySearch([1, 2, 3, 4, 5, 6, 7], 5))
console.log(binarySearch([10, 6, 4], 10))
console.log(binarySearch([10, 6, 4], 4))


function binary_search(items, key){
    if (items == null)return null
    let i = Math.floor(items.length / 2)
    if (key == items[i])return items[i]
    if (key > items[i])
        sliced = items.slice(i+1,items.length)
    else
        sliced = items.slice(0, i-1)
    return binary_search(sliced, key)
  }
  console.log("Fourth Binary Search Implementation")
  console.log(binary_search([1,2,4,5],5))

/**
 * Given an array of numbers sorted in an ascending order, find the ceiling of a given number ‘key’. 
 * The ceiling of the ‘key’ will be the smallest element in the given array greater than or equal to the ‘key’.
 * Write a function to return the index of the ceiling of the ‘key’. If there isn’t any ceiling return -1.
 */
function searchCeilingOfANumber(arr, key){
    let n = arr.length;
    if(key >  arr[n - 1]) return -1;
    let start = 0;
    let end = n -1;
    while(start <= end){
        let mid = Math.floor(start + (end - start) / 2);
        if(key < arr[mid]){
            end = mid - 1;
        }else if(key > arr[mid]){
            start = mid + 1;
        }else{
            return mid;
        }
    }
    return start;
}

console.log("First Binary search case study: searchCeilingOfANumber")
console.log(searchCeilingOfANumber([4, 6, 10], 6))
console.log(searchCeilingOfANumber([1, 3, 8, 10, 15], 12))
console.log(searchCeilingOfANumber([4, 6, 10], 17))
console.log(searchCeilingOfANumber([4, 6, 10], -1))

/**
 * Given an array of numbers sorted in ascending order, find the floor of a given number ‘key’. 
 * The floor of the ‘key’ will be the biggest element in the given array smaller than or equal to the ‘key’
 * Write a function to return the index of the floor of the ‘key’. If there isn’t a floor, return -1.
 */
function searchFloorOfANumber(arr, key){
    let n = arr.length
    if(key <  arr[0]) return -1;
    let start = 0;
    let end = n -1;
    while(start <= end){
        let mid = Math.floor(start + (end - start) / 2);
        if(key < arr[mid]){
            end = mid - 1;
        }else if(key > arr[mid]){
            start = mid + 1;
        }else{
            return mid;
        }
    }
    return end;
}
console.log("Second Binary search case study: searchFloorOfANumber")
console.log(searchFloorOfANumber([4, 6, 10], 6))
console.log(searchFloorOfANumber([1, 3, 8, 10, 15], 12))
console.log(searchFloorOfANumber([4, 6, 10], 17))
console.log(searchFloorOfANumber([4, 6, 10], -1))

function count(arr, data){
  var count = 0;
  var position = binSearch(arr, data);
  if(position > -1){
      ++count;
      for(var i = position + 1; i > 0; i--){
          if(arr[i] == data){
              ++count;
          }else{
              break;
          }
      }
      for(var i = position + 1; i< arr.length; i++){
          if(arr[i] == data){
              ++count;
          }else{
              break;
          }
      }
  }
  return count
}
console.log("Third Binary search case study: Count")
console.log(count([1,2,4,5,5,6,6,7,8],5))


