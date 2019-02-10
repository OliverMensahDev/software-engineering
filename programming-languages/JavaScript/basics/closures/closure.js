//1
function init(){
  var name = " Oliver Mensahh";
  function sayHello(){
    console.log("Hello "+ name);
  }
  sayHello();
}
init();

var counter = (function() {
  var privateCounter = 0;
  function changeBy(val) {
    privateCounter += val;
  }
  return {
    increment: function() {
      changeBy(1);
    },
    decrement: function() {
      changeBy(-1);
    },
    value: function() {
      console.log( privateCounter);;
    }
  };
})()


counter.value(); // logs 0
counter.increment();
counter.increment();
counter.value(); // logs 2
counter.decrement();
counter.value(); // logs 1



//counter in normal code not prefarable
var a = 0;
function add(){
  a++;
  if(a==3){
   a=0
   }
   return a;
 }
 console.log(add());
 console.log(add());
 console.log(add());
 console.log(add());
 //with closures
 var add1 = (function(){
   var b = 0;
   return function(){
     b++;
     if(b==3){
       b = 0
     }
     return b;
   }
 })()
 console.log(add1());
 console.log(add1());
 console.log(add1());
