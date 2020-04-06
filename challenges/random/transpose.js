let x = [
  [1, 2, 3, 4], 
  [5, 6, 7, 8]
];

function transpose(twoD)
{
  let rowLength = twoD.length
  let newData = []
  let columLength = twoD[0].length
  for(let j = 0;  j < columLength; j++){ 
    let indexData = Array.from({length: rowLength})
    for(let i = 0 ; i < rowLength; i++){
      indexData[i] = twoD[i][j]
    }
    // indexData[0] = twoD[0][j]
    // indexData[1] = twoD[1][j]
    // indexData[2] = twoD[2][j]
    newData.push(indexData)
  }
  return newData
}


let soln = [
  [00, 13],
  [01, 14],
  [02, 15]
]

console.log(transpose(x))

