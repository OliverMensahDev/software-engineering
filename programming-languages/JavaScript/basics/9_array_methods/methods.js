var data = [1,3,4, 20, -1, 90, 8];

//foreach
data.forEach((elem, index) => {
  console.log(elem);
});

//filter
var isGreaterThan20 = function(data){
  return data > 20;
}
var filtered = data.filter(isGreaterThan20).join(" ");
console.log(filtered);

//reject is not a built in  function u can do that using lodash  or create your own function
//var rejected = data.reject(isGreaterThan20);
//console.log(rejected);


//reduce
var sum = data.reduce((p, c) => {
  return p+c
}, 0);
console.log(sum);

//some
var hasNegativeNumber = function(data){
  return data < 0;
}
console.log(data.some(hasNegativeNumber));
//every
var allPositive = function(data){
  return data > 0;
}
console.log(data.every(allPositive));

//find
var get8 = function(data) {
  return data == 8;
}
console.log(data.find(get8));
