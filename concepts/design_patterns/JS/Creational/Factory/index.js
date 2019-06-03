var repoFactory = function(){
    var repos = this; 
    var repoList = [{name:'task', source:taskRepo},
                   {name:'user', source:userRepo},
                   {name:'project', source:projectRepo}];
    
    repoList.forEach(function(repo){
        repos[repo.name] = new (repo.source)()
    });
    return repos;
}
 
var taskRepo = function () {
    var db = {};
    var get = function (id) {
        console.log('Getting task ' + id);
        return {
            name: 'new task from db'
        }
    }
    var save = function (task) {
        console.log('Saving ' + task.name + ' to the db');
    }
    console.log('newing up task repo');
    return {
        get: get,
        save: save
    }
}
var userRepo = function () {
    var db = {};
    var get = function (id) {
        console.log('Getting user ' + id);
        return {
            name: 'Jon Mills'
        }
    }
    var save = function (user) {
        console.log('Saving ' + user.name + ' to the db');
    }
    return {
        get: get,
        save: save
    }
}

var projectRepo = function () {
    var db = {};
    var get = function (id) {
        console.log('Getting project ' + id);
        return {
            name: 'New project'
        }
    }
    var save = function (project) {
        console.log('Saving ' + project.name + ' to the db');
    }
    return {
        get: get,
        save: save
    }
}

var task = repoFactory().task.get(1);
console.log(task)



function Factory() {
    this.createEmployee = function (type) {
        var employee;
 
        if (type === "fulltime") {
            employee = new FullTime();
        } else if (type === "parttime") {
            employee = new PartTime();
        } else if (type === "temporary") {
            employee = new Temporary();
        } else if (type === "contractor") {
            employee = new Contractor();
        }
 
        employee.type = type;
 
        employee.say = function () {
            log.add(this.type + ": rate " + this.hourly + "/hour");
        }
 
        return employee;
    }
}
 
var FullTime = function () {
    this.hourly = "$12";
};
 
var PartTime = function () {
    this.hourly = "$11";
};
 
var Temporary = function () {
    this.hourly = "$10";
};
 
var Contractor = function () {
    this.hourly = "$15";
};
 
// log helper
var log = (function () {
    var log = "";
 
    return {
        add: function (msg) { log += msg + "\n"; },
        show: function () { alert(log); log = ""; }
    }
})();
 
function run() {
    var employees = [];
    var factory = new Factory();
 
    employees.push(factory.createEmployee("fulltime"));
    employees.push(factory.createEmployee("parttime"));
    employees.push(factory.createEmployee("temporary"));
    employees.push(factory.createEmployee("contractor"));
    
    for (var i = 0, len = employees.length; i < len; i++) {
        employees[i].say();
    }
 
    log.show();
}