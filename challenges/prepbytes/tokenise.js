let dic = [
  "im", 
  "like",
  "on",
  "e",
  "plus",
  "oneplus",
  "mobile"
]
let input = 'imlikeoneplusmobile'
let res = " "
let outPut = []
let outlier = []
for(let i = 0 ; i < dic.length ; i++){
  if(input.indexOf(dic[i]) > -1){
    res += dic[i] + " "
    input = input.replace(dic[i], "")
  }else{
    let startStrip = res.length - (dic[i].length)   
    let anotherRes = res.substring(0, startStrip) + dic[i]  + res.substr(res.length)
    console.log(anotherRes);
  }
   
}
outPut.push(res);

for(let data of outlier){
  if(res.indexOf(data)){
    // let another = res.split(" ").join()
  }
}




console.log(res);

