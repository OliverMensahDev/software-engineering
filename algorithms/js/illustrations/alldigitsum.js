
function allDigitSum(num){
    let dataArray = num.toString().split('')
    let len = dataArray.length;
    let res = 0
    for (var i = 0; i < len/2; i++) {
        if(len / 2 === 0){
           res += parseInt(dataArray[i]) + parseInt(dataArray[len - 1 - i]) 
        }else{
            res += parseInt(dataArray[i])
        }
    }
    return res
}

function allDigitSum1(num){
 // Time: O(n)
 // Extra Space: O(1 * n)
    let dataArray = num.toString().split('')
    return dataArray.reduce((prev, cur) => parseInt(prev) + parseInt(cur), 0)   
}



console.log(allDigitSum(230));

