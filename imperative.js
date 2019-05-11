let students = [
    {name: "Oliver Mensah", age: 26, email: "olivermensah96@gmail.com"},
    {name: "Nana Adu", age: 16, email: null},
    {name: "Priscila Buer", age: 23, email: "priscilabuer@gmail.com"}
]

// function map(items, func){
//     let result = []
//     for(item of items){
//         result.push(func(item))
//     }
//     return result
// }
// let studentAges  = map(students, (student) => student.age)
// console.log(studentAges);




// function getUserAges(students){
//     let ages  = [];
//     for(i=0; i< students.length; i++){
//         let student = students[i];
//         if(student.age > 20){
//             age = student.age
//             ages.push(age)
//         }
//     }
//     return ages
// }



// console.log(getUserAges(students));
// console.log(students.filter(user => user.age > 20).map(user => user.age));


// function filter(items, func){
//     let result = []
//    for(item of items){
//         if(func(item)){
//             result.push(item)
//         }
//     }
//     return result
// }

// function map(items, func){
//     let result = []
//     for(item of items){
//         result.push(func(item))
//     }
//     return result
// }

// function reject(items, func){
//     return filter(items, function (item){
//         return ! func(item);
//     })
// }
// let studentAged20Plus = reject(students, (student) => student.age >20)
// console.log(map(studentAged20Plus, (student) => student.age));




// function averageAge(students){
//     let sumAge  = 0;
//     for(i=0; i< students.length; i++){
//         let student = students[i];
//         sumAge += student.age
//     }
//     return sumAge/students.length
// }


// console.log(averageAge(students))

// console.log(students.reduce((acc, curr)=> acc + curr.age, 0) / students.length);

