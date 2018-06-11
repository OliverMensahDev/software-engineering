function range(a,b)
{
  var accumulator = [];
  if(a < b){
    while(a<=b){
      accumulator.push(a)
      a++;
    }
    return accumulator;
  }else{
    console.log("It is not a valid range to produce an array");
  }
}

function sum(arr){
  if(Array.isArray(arr)){
    var c = 0;
    arr.forEach(elem => {
      c+= elem;
    });
    return c;
   }
   else{
   console.log("Not valid range");
  }
}
console.log(range(10, 20));
console.log(sum(range(10, 20)));