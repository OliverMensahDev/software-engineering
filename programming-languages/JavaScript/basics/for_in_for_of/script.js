var arr  = [1,30,5,8]
arr.foo = "hello";

for (let prop in arr) {
  console.log(prop);
}

for (let prop of arr) {
  console.log(prop);
}
