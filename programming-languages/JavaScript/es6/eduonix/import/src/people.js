// common js

//  function person(){
//      return "Oliver"
//  }
//  let greet = "Hi"
 
//  module.exports ={
//      person:person,
//      greet: greet
//  } 


//es6
export function person(){
    return "Oliver "
}


export class Person{
    constructor(name){
        this.name = name
    }
    sayHello(){
        return `Hello ${this.name}`
    }
}