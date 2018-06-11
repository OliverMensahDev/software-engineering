function isPrime(n){
  let factors = [],
      divisor = 2;

  while( n >= 2 ) {
    if( n % divisor == 0){
      factors.push(divisor);
      n = n / divisor;
    } else {
      divisor++;
    }
  }
  return factors.length === 1 
}


console.log(isPrime(2));
console.log(isPrime(3));
console.log(isPrime(5));
console.log(isPrime(9));
