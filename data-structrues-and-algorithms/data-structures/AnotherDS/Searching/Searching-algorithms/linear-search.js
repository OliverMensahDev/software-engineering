function dispArr(arr){
    for(var i=0; i<arr.length; i++){
        console.log(arr[i]+"");
        if(i % 10 == 9){
            console.log("\n");
        }

        if(i % 10 !=0){
            console.log("\n");
        }
    }
}

var nums = [];
for(var i=0; i<100; i++){
    nums[i] = Math.floor(Math.random()*101);
}
dispArr(nums); // The functionality is used to print random elements in an array.

function seqSearch(arr,data){
    for(var i=0; i<arr.length; i++){
        if(arr[i] == data){ // If the appropriate match is found
            return true;
        }
    }
}

var num =77;
if(seqSearch(nums,num)){
    console.log(num + " is in the array. ");
}
else{
    console.log(num + " is not present in the array");
}