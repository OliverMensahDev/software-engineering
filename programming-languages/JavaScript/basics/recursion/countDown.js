function countDown(num){
  if( num == 1) return 1;
  return countDown(num-1);
}

console.log(countDown(10));
