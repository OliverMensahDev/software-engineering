//Issue because the this refers to its function
var PersonErr = {
    name: 'John Doe',
    age: 24,
    city:'Dallas',
    startAging: function(){
        setInterval(function(){
            this.age++
            console.log(this.age);
        }, 100)
    }
}
var person1 = Object.create(PersonErr);


// solve with this
var PersonSolve= {
    name: 'John Doe',
    age: 24,
    city:'Dallas',
    startAging: function(){
        var that = this;
        setInterval(function(){
            that.age++
            console.log(that.age);
        }, 100)
    }
}
var person2 = Object.create(PersonSolve);


//solve with arrow
var PersonSolveArrow= {
    name: 'John Doe',
    age: 24,
    city:'Dallas',
    startAging: function(){
        setInterval(()=>{
            this.age++
            console.log(this.age);
        }, 100)
    }
}
var person3 = Object.create(PersonSolve);
person3.startAging();
