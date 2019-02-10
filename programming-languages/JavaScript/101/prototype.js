var Employee = function(){

}

Employee.prototype = {
    doWork: function(){
        return "Complete!";
    }
}

var e = new Employee();
console.log(e.doWork());