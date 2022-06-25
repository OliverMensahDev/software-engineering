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
console.log("binarySearch")
console.log(binarySearch([4, 6, 10], 10));
console.log(binarySearch([1, 2, 3, 4, 5, 6, 7], 5))
console.log(binarySearch([10, 6, 4], 10))
console.log(binarySearch([10, 6, 4], 4))

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

console.log("searchCeilingOfANumber")
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

console.log("searchFloorOfANumber")
console.log(searchFloorOfANumber([4, 6, 10], 6))
console.log(searchFloorOfANumber([1, 3, 8, 10, 15], 12))
console.log(searchFloorOfANumber([4, 6, 10], 17))
console.log(searchFloorOfANumber([4, 6, 10], -1))