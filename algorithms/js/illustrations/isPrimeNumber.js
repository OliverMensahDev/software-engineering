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


function prime(n){
  if(n<= 1){
    return false;
  }
  for(i = 2; i < n; i++){
    if(n % i === 0) return false
  }
  return true;
}

console.log(prime(2));
console.log(prime(3));
console.log(prime(5));
console.log(prime(11));
