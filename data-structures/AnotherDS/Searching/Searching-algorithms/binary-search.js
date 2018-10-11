function dispArr(arr){
    for(var i=0; i<arr.length; i++){
        console.log(arr[i] + "");
        if(i % 10 ==9){
            console.log("\n");
        }
        if(i%10 == 0){
            console.log("\n");
        }
    }
}

var nums = [];
for(var i=0; i<100; i++){
    nums[i] = Math.floor(Math.random()*101);
}
dispArr(nums);


// Implementation of Binary Search Algorithm

function binSearch(arr,data){
    var upperBound = arr.length-1;
    var lowerBound = 0;
    while(lowerBound <= upperBound){
        var mid = Math.floor((upperBound+lowerBound)/2);
        if(arr[mid] < data){
            lowerBound = mid + 1;
        } 
        else if(arr[mid] > data) {
            upperBound = mid - 1;
        }
        else {
            return mid;
        }
    }
    return -1;
}

var nums = [];
for(var i=0; i<100 ; i++){
    nums[i] = Math.floor(Math.random()*101);
}
dispArr(nums);
var val = 24;
var retVal = binSearch(nums,val);
if(retVal>=0){
    console.log("Found "+val+ " at position "+ retVal);
}
else {
    console.log(val + " is not in array ");
}