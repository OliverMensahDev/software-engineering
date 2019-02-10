define("app/es6/employee", [], function() {
  "use strict";
  var __moduleName = "app/es6/employee";
  var s_name = Symbol();
  var Employee = function Employee(name) {
    $traceurRuntime.setProperty(this, s_name, name);
  };
  ($traceurRuntime.createClass)(Employee, {
    get name() {
      return this[$traceurRuntime.toProperty(s_name)];
    },
    doWork: function() {
      return (this.name + " is working");
    }
  }, {});
  var log = function(employee) {
    console.log(employee.name);
  };
  var defaultRaise = 0.03;
  var modelEmployee = new Employee("Allen");
  return {
    get Employee() {
      return Employee;
    },
    get log() {
      return log;
    },
    get defaultRaise() {
      return defaultRaise;
    },
    get modelEmployee() {
      return modelEmployee;
    },
    __esModule: true
  };
});
