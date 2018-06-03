function isPrime(n){
  var divisor = 3;
  limit = Math.sqrt(n);
  if(n==2 || n==3)
    return true;
  if(n % 2 == 0)
    return false;
  while(divisor <= limit){
    if( n % divisor == 0)
      return false;
    else
      divisor +=2;
  }
  return true;
}


console.log(isPrime(2));
console.log(isPrime(3));
console.log(isPrime(5));
console.log(isPrime(9));
