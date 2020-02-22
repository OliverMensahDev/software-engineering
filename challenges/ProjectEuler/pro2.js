/**
 * Find the sum of all the even-valued terms in the Fibonacci sequence which do not exceed four million.
 */

total = 0
let x = 1, y =  2;
while (x < 4000000){
  let yTem = y
    y = x + y
    if (x % 2 == 0)
      total += x
    x = yTem
}
console.log(total);