function primeFactors(n){
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
  return factors;
}

console.log(primeFactors(2));
primeFactors(2).forEach(function(element, index){
  console.log(element);
})
