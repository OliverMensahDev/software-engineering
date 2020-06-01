function fizzBuss() {
  for (let index = 1; index < 101; index++) {
    if (index % 5 == 0 && index % 3 == 0) {
      return 'FizzBuss';
    } else if (index % 5 == 0) {
      return 'Fizz';
    } else if (index % 3 == 0) {
      return 'Buzz';
    } else {
      return index;
    }
  }
}
console.log(fizzBuss());

for (let index = 1; index < 101; index++) {
  const isFizz = index % 5 == 0;
  const isBuzz = index % 3 == 0;
  let result =
    isFizz && isBuzz ? 'FizzBuss' : isFizz ? 'Fizz' : isBuzz ? 'Buzz' : index;
  console.log(result);
}
