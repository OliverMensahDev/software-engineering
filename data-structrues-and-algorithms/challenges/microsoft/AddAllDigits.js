function addAllDigits(num){
  let stringArr = num.toString().split("");
  let length = stringArr.length;
  if(length == 1) return stringArr[0];
  else{
    let sum = 0;
    for(let i=0; i < length; i++){
      sum += parseInt(stringArr[i]);
    }
    return addAllDigits(sum);
  }
}
console.log(addAllDigits(2038));
