'use strict';

var _people = require('./people');

console.log('===================================='); // common Js 

// let person = require("./people").person
// let greet = require("./people").greet
// console.log('====================================')
// console.log(person())
// console.log(greet)
// console.log('====================================')


// es6

var me = new _people.Person("oliver");
console.log(me.sayHello());
console.log('====================================');