"use strict"
class Person{
    constructor(name, location, age){
        this.name = name;
        this.location = location;
        this.age = age;
    }

    static nameClass(){
        console.log('====================================');
        console.log("Person Class");
        console.log('====================================');
    }

    sayHello(){
        console.log(`Hello, my name is ${this.name} and I am from ${this.location}`);
    }
}

class Student extends Person{
    constructor(name, location, age, major){
        //to let the student know it is using Person props
        super(name, location, age);
        this.major = major
    }
    sayHi(){
        super.sayHello();
    }
}

let person1 = new Student("Oliver Mensah", "Bekwai", 23, "Computer Science");
person1.sayHello()