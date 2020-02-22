function twoElementSum(data, sum){
  let map = {};
  let res = []
  for(value of data){
    let complement = sum - value
    if(map.hasOwnProperty(complement)){
      res.push({value, complement}) 
    }else{
      map[value] = value
    }
  }
  return res;
}


console.log(twoElementSum([1,3,5,3], 3));
