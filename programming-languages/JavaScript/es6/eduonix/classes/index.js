class Student{
    constructor(name, email,course){
        this.name = name;
        this.email = email;
        this.course = course;
    }
    sayName(){
        return this.name
    };
    sayCourse(){
        return this.course;
    }
    sayEmail(){
        return this.email
    }
}

let nana =  new Student("Oliver Mensah", "olivermensah96@gmail.com", "Computer Science");
console.log(nana.sayCourse())