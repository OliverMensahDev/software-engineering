function largest(str){
  str = str.split(' ');
  str = str.sort(function(a,b){
    return b.length - a.length;
  });
  let res = [];
  str.forEach(function(elm){
    if(str[0].length == elm.length){
      res.push(elm);
    }
  })
  return res.join(' ');
}
console.log(largest("I love my father and my mother  but the best is my"));
