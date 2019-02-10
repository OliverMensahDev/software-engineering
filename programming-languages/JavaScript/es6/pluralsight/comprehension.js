//array comprehension
var numbers = [1, 2, 3, 4];
//var doubled = [for (i of numbers) i * 2];
var doubled = numbers.map(i => i * 2);
console.log(doubled);

//var evens = [for (i of numbers) if (i % 2 === 0) i];
var evens = numbers.filter(i => i % 2 === 0);
console.log(evens);

//generator comprehension
var data = [1, 2, 3, 4];
var dataDoubled = (for (i of numbers) i * 2);
console.log(dataDoubled);
