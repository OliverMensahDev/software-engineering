function solution(arr){
  let res = [];
  for(let i = 0; i < arr.length; i++){
    leftValues = arr.slice(0, i);
    rightValues = arr.slice(i, arr.length)
    let prod = [...leftValues,...rightValues.slice(1, rightValues.length)].reduce((acc, cur)=> acc * cur, 1)
    res.push(prod)
  }
  return res
} 
console.log(solution([10,3, 5, 6, 1]))

function solution1(arr){
  let res = []
  let prod = arr.reduce((acc, cur)=> acc * cur, 1)
  for(let i = 0; i < arr.length; i++){
    res.push(prod/arr[i])
  }
  return res
}
console.log(solution1([10,3, 5, 6, 1]))

function solution2(arr){
  let res = []
  let prod = arr.reduce((acc, cur)=> acc * cur, 1)
  for(let i = 0; i < arr.length; i++){
    res.push(prod * Math.pow(arr[i], -1))
  }
  return res
}
console.log(solution1([10,3, 5, 6, 1]))