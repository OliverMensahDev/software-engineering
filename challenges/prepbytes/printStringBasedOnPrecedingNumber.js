let a = "2ab4cd10ef";
function sol1(input){
  let data = input.split('');
  let map  = new Map();
  let num = []
  let key 
  for(let i = 0; i < data.length ; i++){
    if(data[i] >= '0' && data[i] <= '9'){
      num.push(data[i])
    }else{
        if(num.length > 0 ){
          key = num.join('');
          num = []
        }
        if(map.has(key)){
          let res = map.get(key) + data[i]
          map.set(key, res)
        }else{ 
          map.set(key, data[i])
        }
    }    
  }
  let res =''
  for (let [key, value] of map) {
    let length = parseInt(key)
    for(let i = 0; i < length; i++){
      res +=value
    }
  }
  return res
}

console.log(sol1(a));
