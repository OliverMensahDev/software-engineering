"use strict";
describe("iterables", function() {
  it("can work with iterators at a low level", function() {
    var sum = 0;
    var numbers = [1, 2, 3, 4];
    sum = 0;
    {
      try {
        throw undefined;
      } catch ($i) {
        $i = 0;
        for (; $i < numbers.length; $i++) {
          try {
            throw undefined;
          } catch (i) {
            i = $i;
            try {
              sum += numbers[$traceurRuntime.toProperty(i)];
            } finally {
              $i = i;
            }
          }
        }
      }
    }
    expect(sum).toBe(10);
    sum = 0;
    for (var $i in numbers) {
      try {
        throw undefined;
      } catch (i) {
        i = $i;
        sum += numbers[$traceurRuntime.toProperty(i)];
      }
    }
    expect(sum).toBe(10);
    sum = 0;
    var iterator = numbers[$traceurRuntime.toProperty(Symbol.iterator)]();
    var next = iterator.next();
    while (!next.done) {
      sum += next.value;
      next = iterator.next();
    }
    expect(sum).toBe(10);
  });
});
describe("for of", function() {
  it("can work with iteratables at a high level", function() {
    var sum = 0;
    var numbers = [1, 2, 3, 4];
    for (var $__2 = numbers[$traceurRuntime.toProperty(Symbol.iterator)](),
        $__3; !($__3 = $__2.next()).done; ) {
      try {
        throw undefined;
      } catch (n) {
        n = $__3.value;
        {
          sum += n;
        }
      }
    }
    expect(sum).toBe(10);
  });
});
describe("iterable", function() {
  it("can be built by implementing Symbol.iterator", function() {
    var $__1;
    var Company = function Company() {
      this.employees = [];
    };
    ($traceurRuntime.createClass)(Company, ($__1 = {}, Object.defineProperty($__1, "addEmployees", {
      value: function() {
        for (var names = [],
            $__4 = 0; $__4 < arguments.length; $__4++)
          $traceurRuntime.setProperty(names, $__4, arguments[$traceurRuntime.toProperty($__4)]);
        this.employees = this.employees.concat(names);
      },
      configurable: true,
      enumerable: true,
      writable: true
    }), Object.defineProperty($__1, Symbol.iterator, {
      value: function() {
        return new ArrayIterator(this.employees);
      },
      configurable: true,
      enumerable: true,
      writable: true
    }), $__1), {});
    var ArrayIterator = function ArrayIterator(array) {
      this.array = array;
      this.index = 0;
    };
    ($traceurRuntime.createClass)(ArrayIterator, {next: function() {
        var result = {
          value: undefined,
          done: true
        };
        if (this.index < this.array.length) {
          result.value = this.array[$traceurRuntime.toProperty(this.index)];
          result.done = false;
          this.index += 1;
        }
        return result;
      }}, {});
    var count = 0;
    var company = new Company();
    company.addEmployees("Tim", "Sue", "Joy", "Tom");
    for (var $__2 = company[$traceurRuntime.toProperty(Symbol.iterator)](),
        $__3; !($__3 = $__2.next()).done; ) {
      try {
        throw undefined;
      } catch (employee) {
        employee = $__3.value;
        {
          count += 1;
        }
      }
    }
    expect(count).toBe(4);
  });
});

//# sourceMappingURL=iterators.js.map