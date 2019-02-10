const user = {
  name: "Oliver Mensah",
  location: {
    state:"Accra",
    country:"Ghana"
  },
  professional:"Mobile and Web Developer"
}
const {name, location:{state}} = user
console.log(state)
//assign a variable
const { name: FULLNAME} = user
console.log(FULLNAME);
//others
const {professional, ...rest} = user
console.log(rest);


const animals = [
  {
    name:"Dog",
    legs:4
  },
  {
    name:"Fish",
    legs:0
  },
  {
    name:"Cat",
    legs:4
  }
]

const [animal1, cat, fish] = animals;
console.log(animal1, cat , fish);
//ignore
const [, cat1] = animals
console.log(cat1);
const [dog1, ...rest1] = animals
console.log(rest1);


function greetings({name1, ...rest2}){
  console.log(`Hello ${name}, who have age of ${rest2.age}`);
}
greetings({name1:"Oliver ", age:65, country:"Ghana"})
