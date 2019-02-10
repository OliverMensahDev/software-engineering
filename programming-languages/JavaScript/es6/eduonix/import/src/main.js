// common Js 

// let person = require("./people").person
// let greet = require("./people").greet
// console.log('====================================')
// console.log(person())
// console.log(greet)
// console.log('====================================')


// es6
import {Person}  from './people'
console.log('====================================')
var me = new Person("oliver")
console.log(me.sayHello())
console.log('====================================')