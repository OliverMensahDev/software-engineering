"use strict";
describe("the class keyword", function() {
  it("can create a class", function() {
    var Employee = function Employee() {};
    ($traceurRuntime.createClass)(Employee, {
      doWork: function() {
        return "complete!";
      },
      getName: function() {
        return "Scott";
      }
    }, {});
    var e = new Employee();
    expect(e.doWork()).toBe("complete!");
    expect(e.getName()).toBe("Scott");
    expect(Employee.prototype.doWork.call(e)).toBe("complete!");
  });
  it("can have a constructor", function() {
    var Employee = function Employee(name) {
      this._name = name;
    };
    ($traceurRuntime.createClass)(Employee, {
      doWork: function() {
        return "complete!";
      },
      getName: function() {
        return this._name;
      }
    }, {});
    var e1 = new Employee("Scott");
    var e2 = new Employee("Alex");
    expect(e1.getName()).toBe("Scott");
    expect(e2.getName()).toBe("Alex");
  });
  it("can have getters and setters", function() {
    var Employee = function Employee(name) {
      this.name = name;
    };
    ($traceurRuntime.createClass)(Employee, {
      doWork: function() {
        return "complete!";
      },
      get name() {
        return this._name.toUpperCase();
      },
      set name(newValue) {
        this._name = newValue;
      }
    }, {});
    var e1 = new Employee("Scott");
    var e2 = new Employee("Alex");
    expect(e1.name).toBe("SCOTT");
    expect(e2.name).toBe("ALEX");
    e1.name = "Chris";
    expect(e1.name).toBe("CHRIS");
  });
  it("can have a super class", function() {
    var Person = function Person(name) {
      this.name = name;
    };
    ($traceurRuntime.createClass)(Person, {
      get name() {
        return this._name;
      },
      set name(newValue) {
        if (newValue) {
          this._name = newValue;
        }
      }
    }, {});
    var Employee = function Employee() {
      $traceurRuntime.defaultSuperCall(this, $Employee.prototype, arguments);
    };
    var $Employee = Employee;
    ($traceurRuntime.createClass)(Employee, {doWork: function() {
        return (this._name + " is working");
      }}, {}, Person);
    var p1 = new Person("Scott");
    var e1 = new Employee("Christopher");
    expect(p1.name).toBe("Scott");
    expect(e1.name).toBe("Christopher");
    expect(e1.doWork()).toBe("Christopher is working");
  });
  it("can invoke super methods", function() {
    var Person = function Person(name) {
      this.name = name;
    };
    ($traceurRuntime.createClass)(Person, {
      get name() {
        return this._name;
      },
      set name(newValue) {
        if (newValue) {
          this._name = newValue;
        }
      }
    }, {});
    var Employee = function Employee(title, name) {
      $traceurRuntime.superCall(this, $Employee.prototype, "constructor", [name]);
      this._title = title;
    };
    var $Employee = Employee;
    ($traceurRuntime.createClass)(Employee, {
      get title() {
        return this._title;
      },
      doWork: function() {
        return (this._name + " is working");
      }
    }, {}, Person);
    var e1 = new Employee("Developer", "Scott");
    expect(e1.name).toBe("Scott");
    expect(e1.title).toBe("Developer");
  });
  it("can override methods", function() {
    var Person = function Person(name) {
      this.name = name;
    };
    ($traceurRuntime.createClass)(Person, {
      get name() {
        return this._name;
      },
      set name(newValue) {
        if (newValue) {
          this._name = newValue;
        }
      },
      doWork: function() {
        return "free";
      },
      toString: function() {
        return this.name;
      }
    }, {});
    var Employee = function Employee(title, name) {
      $traceurRuntime.superCall(this, $Employee.prototype, "constructor", [name]);
      this._title = title;
    };
    var $Employee = Employee;
    ($traceurRuntime.createClass)(Employee, {
      get title() {
        return this._title;
      },
      doWork: function() {
        return "paid";
      }
    }, {}, Person);
    var e1 = new Employee("Developer", "Scott");
    var p1 = new Person("Alex");
    expect(p1.doWork()).toBe("free");
    expect(e1.doWork()).toBe("paid");
    expect(p1.toString()).toBe("Alex");
    expect(e1.toString()).toBe("Scott");
    var makeEveryoneWork = function() {
      for (var people = [],
          $__1 = 0; $__1 < arguments.length; $__1++)
        $traceurRuntime.setProperty(people, $__1, arguments[$traceurRuntime.toProperty($__1)]);
      var results = [];
      for (var i = 0; i < people.length; i++) {
        if (people[$traceurRuntime.toProperty(i)] instanceof Person) {
          results.push(people[$traceurRuntime.toProperty(i)].doWork());
        }
      }
      ;
      return results;
    };
    expect(makeEveryoneWork(p1, e1, {})).toEqual(["free", "paid"]);
  });
});

//# sourceMappingURL=classes.js.map