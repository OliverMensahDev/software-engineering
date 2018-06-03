function seqSearch(arr, data){
    for(var i=0; i<arr.length; i++){
        if(arr[i] == data){
            return true;
        }
    }
}

console.log(seqSearch([2,4,5,8,10,100], 10))