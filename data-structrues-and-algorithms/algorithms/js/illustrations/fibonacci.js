function fibGenerator(target){
  let fibNumbers = []
  fibNumbers[0] = 0;
  fibNumbers[1] = 1;
  
  for(let i = 2; i <= target; i++){
    fibNumbers[i] = fibNumbers[i-1] + fibNumbers[i-2]
  }
  return fibNumbers[target];
}

console.log(fibGenerator(6));

