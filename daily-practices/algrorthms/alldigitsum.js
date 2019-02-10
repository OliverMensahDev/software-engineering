function allDigitSum(num){
    let dataArray = num.toString().split('')
    return dataArray.reduce((prev, cur) => Number.parseInt(prev) + Number.parseInt(cur), 0)   
}


// function allDigitSum(num){
//     let dataArray = num.toString().split('')
//     let len = dataArray.length;
//     let res = 0
//     for (var i = 0; i < len/2; i++) {
//         res += Number.parseInt(dataArray[i])  + Number.parseInt(dataArray[len - 1 - i])
//     }
//     return res

// }

console.log(allDigitSum(230));

