//1 ternary
const x = 20;
let answer;
if (x > 10) {
    answer = 'greater than 10';
} else {
    answer = 'less than 10';
}
console.log(answer);
const answerS = x > 10 ? 'greater than 10' : 'less than 10';
console.log(answerS);


//short circuilt
let variable1;
if (variable1 !== null || variable1 !== undefined || variable1 !== '') {
     let variable2 = variable1;
}
let variable2 = variable1  || '';
console.log(variable2 === ''); // prints true

variable1 = 'foo';
variable2 = variable1  || '';
console.log(variable2); // prints foo


//declaration
let x;
let y;
let z = 3;

let x, y, z=3;


//if
if (likeJavaScript === true)

if (likeJavaScript)

let a;
if ( a !== true ) {
// do something...
}

let a;
if ( !a ) {
// do something...
}


//for
for (let i = 0; i < allImgs.length; i++)

for (let index of allImgs)

//foreach
function logArrayElements(element, index, array) {
  console.log("a[" + index + "] = " + element);
}

[2, 5, 9].forEach(logArrayElements);


//if else
let dbHost;
if (process.env.DB_HOST) {
  dbHost = process.env.DB_HOST;
} else {
  dbHost = 'localhost';
}

const dbHost = process.env.DB_HOST || 'localhost';

//base 10
for (let i = 0; i < 10000; i++) {}

for (let i = 0; i < 1e7; i++) {}

//object
const obj = { x:x, y:y };

const obj = { x, y };
//functions
function sayHello(name) {
  console.log('Hello', name);
}
setTimeout(function() {
  console.log('Loaded')
}, 2000);
list.forEach(function(item) {
  console.log(item);
});

sayHello = name => console.log('Hello', name);
setTimeout(() => console.log('Loaded'), 2000);
list.forEach(item => console.log(item));

//implicit return
function calcCircumference(diameter) {
  return Math.PI * diameter
}

calcCircumference = diameter => (
  Math.PI * diameter;
)

//default values
function volume(l, w, h) {
  if (w === undefined)
    w = 3;
  if (h === undefined)
    h = 4;
  return l * w * h;
}

volume = (l, w = 3, h = 4 ) => (l * w * h);

//concatenation
const db = 'http://' + host + ':' + port + '/' + database;

const db = `http://${host}:${port}/${database}`;

//destruction
const observable = require('mobx/observable');
const action = require('mobx/action');
const runInAction = require('mobx/runInAction');
const store = this.props.store;
const form = this.props.form;
const loading = this.props.loading;
const errors = this.props.errors;
const entity = this.props.entity;

import { observable, action, runInAction } from 'mobx';
const { store, form, loading, errors, entity } = this.props;

//multi line
const lorem = 'Lorem ipsum dolor sit amet, consectetur\n\t'
    + 'adipisicing elit, sed do eiusmod tempor incididunt\n\t'
    + 'ut labore et dolore magna aliqua. Ut enim ad minim\n\t'
    + 'veniam, quis nostrud exercitation ullamco laboris\n\t'
    + 'nisi ut aliquip ex ea commodo consequat. Duis aute\n\t'
    + 'irure dolor in reprehenderit in voluptate velit esse.\n\t'

const lorem = `Lorem ipsum dolor sit amet, consectetur
        adipisicing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua. Ut enim ad minim
        veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse.`

//joining arrays
const odd = [1, 3, 5];
const nums = [2 ,4 , 6].concat(odd);

const odd = [1, 3, 5 ];
const nums = [2 ,4 , 6, ...odd];

// cloning arrays
const arr = [1, 2, 3, 4];
const arr2 = arr.slice()

const arr = [1, 2, 3, 4];
const arr2 = [...arr];

//mandatory params
function foo(bar) {
  if(bar === undefined) {
    throw new Error('Missing parameter!');
  }
  return bar;
}

mandatory = () => {
  throw new Error('Missing parameter!');
}
foo = (bar = mandatory()) => {
  return bar;
}

//find in arrays
const pets = [
  { type: 'Dog', name: 'Max'},
  { type: 'Cat', name: 'Karl'},
  { type: 'Dog', name: 'Tommy'},
]
function findDog(name) {
  for(let i = 0; i<pets.length; ++i) {
    if(pets[i].type === 'Dog' && pets[i].name === name) {
      return pets[i];
    }
  }
}
pet = pets.find(pet => pet.type ==='Dog' && pet.name === 'Tommy');


//validation
function validate(values) {
  if(!values.first)
    return false;
  if(!values.last)
    return false;
  return true;
}
validate({first:'Bruce',last:'Wayne'})

// object validation rules
const schema = {
  first: {
    required:true
  },
  last: {
    required:true
  }
}
const validate = (schema, values) => {
  for(field in schema) {
    if(schema[field].required) {
      if(!values[field]) {
        return false;
      }
    }
  }
  return true;
}
