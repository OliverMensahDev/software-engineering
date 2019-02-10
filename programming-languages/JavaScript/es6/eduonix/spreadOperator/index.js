//removes binding of data to functions
function myFunc(){
    console.log(args)
}

var args = [0, 4, 6, 8];
myFunc.apply(null, args);

//es6
myFunc(...args);

//removes binding arrays
var array1 = [1,2,3,4,5];
var array2 = [6,8,9];
Array.prototype.push.apply(array1, array2)
console.log(array1);

//es6
array1.push(...array2);
console.log(array1);
