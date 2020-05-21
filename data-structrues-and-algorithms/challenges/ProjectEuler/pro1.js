/**
 * Problem 1. Find the sum of all the multiples of 3 or 5 below 1000000000.
 */
let sum = 0;
for(let  i = 1; i < 1000000000; i++){
  let cur
  if(i % 3 == 0){
     cur = i;
  } else if(i % 5 == 0){
     cur = i;
  } else if(i % 3 == 0 && i % 5 == 0){
    cur = i;
  }else{
    cur  = 0
  }
  sum += cur
}
console.log(sum)

sum=0
for (i=1 ; i< 1000000000; i++){
  if (i %  3 == 0 || i % 5 == 0) 
      sum += i
}
console.log(sum);

let target = 999999999
function SumDivisibleBy(n){
 let p = Math.floor( target / n)
 return Math.floor(n*(p*(p+1)) / 2)
}
let Output = SumDivisibleBy(3)+SumDivisibleBy(5)-SumDivisibleBy(15) 
console.log(Output);