var original =[true, true, undefined, null, false]
//copying by slice and spread operator
var copy1 = original.slice(0);
var copy2 = [...original];
var modifyCopy1 = copy1.push(["oliver"])
console.log('====================================');
console.log(copy1, copy2,modifyCopy1);
console.log('====================================');