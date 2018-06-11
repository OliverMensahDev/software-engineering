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

console.log(count([1,2,4,5,5,6,6,7,8],5))