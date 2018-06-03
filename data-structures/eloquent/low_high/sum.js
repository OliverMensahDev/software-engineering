//sum from  1 to 10

//1 loop
var total = 0 ;
var count = 10 ;
 while( count <= 20){
   total += count;
   count++;
 }
 console.log(total);

 // 3 creating functions to form higher order function
 function range1(a,b)
 {
   var c = [];
   if(a < b){
     while(a<=b){
       c.push(a)
       a++;
     }
     return c;
   }else{
     console.log("It is not a valid range to produce an array");
   }
 }

 function sum1(arr){
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
 
console.log(sum1(range1(10, 20)));
