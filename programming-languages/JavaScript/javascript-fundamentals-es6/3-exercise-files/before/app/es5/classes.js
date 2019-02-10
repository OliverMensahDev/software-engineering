"use strict";
describe("the class keyword", function() {
  it("can create a class", function() {
    var Employee = function Employee() {};
    ($traceurRuntime.createClass)(Employee, {doWork: function() {
        return "complete!";
      }}, {});
    var e = new Employee();
    expect(e.doWork()).toBe("complete!");
    var Employee = function() {};
    Employee.prototype = {doWork: function() {
        return "complete!";
      }};
    var e = new Employee();
    expect(e.doWork()).toBe("complete");
  });
});

//# sourceMappingURL=classes.js.map