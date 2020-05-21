let input = [[1,3], [2, 4], [5, 7], [6, 8]];

function mutual(input){
  let length = input.length
  let res = []
  for(let i =0; i < length; i++){
    let cur = input[i];
    let leftValues = input.slice(0, i);
    let rightValues = input.slice(i, input.length)
    let remainingInput = [...leftValues,...rightValues.slice(1, rightValues.length)]
    for(let j = 0; j < remainingInput.length; j++){
      let first = remainingInput[j][0];
      let second = remainingInput[j][1]
      let thisBetween = first < cur[1] && first > cur[0] 
      let curBetween = cur[1] < second && cur[1] > first 
      if( thisBetween && curBetween) res.push([cur[0], second])
    }
  }
  return res
}

console.log(mutual(input));
