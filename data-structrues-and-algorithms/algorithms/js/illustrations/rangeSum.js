function range(a,b, interval)
{
  var accumulator = [];
  if(a < b){
    while(a<=b){
      accumulator.push(a)
      if(interval && interval > 1){
        a = a + interval
      }else a++
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
console.log(range(10, 20, -1));
console.log(sum(range(10, 20)));