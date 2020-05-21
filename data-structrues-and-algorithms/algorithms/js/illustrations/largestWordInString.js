function largest(str){
  str = str.split(' ');
  str = str.sort(function(a,b){
    return b.length - a.length;
  });
  console.log(str);
  let res = [];
  str.forEach(function(elm){
    if(str[0].length != elm.length){
      return;
    }else{
      res.push(elm);
    }
    console.log("checks")
  })
  return res.join(' ');
}

function longest(str) {
  if(str == undefined) {
      return "Add A String";
  }
  if(typeof str !== 'string') {
      return " It must be a string";
  }
  let sorted = str.split(' ').sort((a,b)=> b.length - a.length)
  let longest = sorted.filter((word)=>sorted[0].length === word.length ).join(' ')
  return longest;
}
console.log(longest("I love my father and my mother  but the best is my"));

