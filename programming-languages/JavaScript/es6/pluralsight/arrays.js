var data  = [1,4,5];
var match = data.find(item => item > 2);
console.log(match);

var index = data.findIndex(item  => item==4);
console.log(index);

var newData = data.fill('a');
console.log(newData);
var newData1 = newData.fill(1, 0, 3);
console.log(newData1);
