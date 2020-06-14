let students = [
  { name: 'Oliver Mensah', age: 26, email: 'olivermensah96@gmail.com' },
  { name: 'Nana Adu', age: 16, email: null },
  { name: 'Priscila Buer', age: 23, email: 'priscilabuer@gmail.com' },
];

function map(items, func) {
  let result = [];
  for (item of items) {
    result.push(func(item));
  }
  return result;
}
let studentAges = map(students, (student) => student.age);
console.log(studentAges);

function getUserAges(students) {
  let ages = [];
  for (i = 0; i < students.length; i++) {
    let student = students[i];
    if (student.age > 20) {
      age = student.age;
      ages.push(age);
    }
  }
  return ages;
}
console.log(getUserAges(students));

function averageAge(students) {
  let sumAge = 0;
  for (i = 0; i < students.length; i++) {
    let student = students[i];
    sumAge += student.age;
  }
  return sumAge / students.length;
}

console.log(averageAge(students));
