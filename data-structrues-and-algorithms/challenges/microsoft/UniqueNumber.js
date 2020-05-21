function uniqueNumber(data){
  let map = {}
  for(value of data){
    map[value] = occurrence(map[value])
  }
 for(key in map){
   if(map[key] == 1) return key;
 }
}

function occurrence(data)
{
  if(data == null){
    data = 1      
  }else{
    data = data + 1
  } 
  return data;
}

let  data = [1,2,3,4,5,5,4,2,3, 1, 9];
console.log(uniqueNumber(data));
