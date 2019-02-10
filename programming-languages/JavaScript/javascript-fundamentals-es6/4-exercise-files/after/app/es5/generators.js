"use strict";
describe("generators", function() {
  it("can build an iterable", function() {
    var numbers = $traceurRuntime.initGeneratorFunction(function $__5(start, end) {
      var i,
          $i;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              $ctx.pushTry(28, null);
              $ctx.state = 31;
              break;
            case 31:
              throw undefined;
              $ctx.state = 33;
              break;
            case 33:
              $ctx.popTry();
              $ctx.state = -2;
              break;
            case 28:
              $ctx.popTry();
              $i = $ctx.storedException;
              $ctx.state = 26;
              break;
            case 26:
              $i = start;
              $ctx.state = 27;
              break;
            case 27:
              $ctx.state = ($i <= end) ? 17 : -2;
              break;
            case 22:
              $i++;
              $ctx.state = 27;
              break;
            case 17:
              $ctx.pushTry(15, null);
              $ctx.state = 18;
              break;
            case 18:
              throw undefined;
              $ctx.state = 20;
              break;
            case 20:
              $ctx.popTry();
              $ctx.state = 22;
              break;
            case 15:
              $ctx.popTry();
              i = $ctx.storedException;
              $ctx.state = 13;
              break;
            case 13:
              i = $i;
              $ctx.state = 14;
              break;
            case 14:
              $ctx.pushTry(null, 6);
              $ctx.state = 8;
              break;
            case 8:
              $ctx.state = 2;
              return i;
            case 2:
              $ctx.maybeThrow();
              $ctx.state = 22;
              break;
            case 6:
              $ctx.popTry();
              $ctx.state = 12;
              break;
            case 12:
              $i = i;
              $ctx.state = 10;
              break;
            default:
              return $ctx.end();
          }
      }, $__5, this);
    });
    var sum = 0;
    for (var $__2 = numbers(1, 5)[$traceurRuntime.toProperty(Symbol.iterator)](),
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
    expect(sum).toBe(15);
  });
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
      value: $traceurRuntime.initGeneratorFunction(function $__5() {
        var $__2,
            $__3,
            e;
        return $traceurRuntime.createGeneratorInstance(function($ctx) {
          while (true)
            switch ($ctx.state) {
              case 0:
                $__2 = this.employees[$traceurRuntime.toProperty(Symbol.iterator)]();
                $ctx.state = 14;
                break;
              case 14:
                $ctx.state = (!($__3 = $__2.next()).done) ? 9 : -2;
                break;
              case 9:
                $ctx.pushTry(7, null);
                $ctx.state = 10;
                break;
              case 10:
                throw undefined;
                $ctx.state = 12;
                break;
              case 12:
                $ctx.popTry();
                $ctx.state = 14;
                break;
              case 7:
                $ctx.popTry();
                e = $ctx.storedException;
                $ctx.state = 5;
                break;
              case 5:
                e = $__3.value;
                $ctx.state = 6;
                break;
              case 6:
                $ctx.state = 2;
                return e;
              case 2:
                $ctx.maybeThrow();
                $ctx.state = 14;
                break;
              default:
                return $ctx.end();
            }
        }, $__5, this);
      }),
      configurable: true,
      enumerable: true,
      writable: true
    }), $__1), {});
    var filter = $traceurRuntime.initGeneratorFunction(function $__6(items, predicate) {
      var $__2,
          $__3,
          item;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              $__2 = items[$traceurRuntime.toProperty(Symbol.iterator)]();
              $ctx.state = 15;
              break;
            case 15:
              $ctx.state = (!($__3 = $__2.next()).done) ? 10 : -2;
              break;
            case 10:
              $ctx.pushTry(8, null);
              $ctx.state = 11;
              break;
            case 11:
              throw undefined;
              $ctx.state = 13;
              break;
            case 13:
              $ctx.popTry();
              $ctx.state = 15;
              break;
            case 8:
              $ctx.popTry();
              item = $ctx.storedException;
              $ctx.state = 6;
              break;
            case 6:
              item = $__3.value;
              $ctx.state = 7;
              break;
            case 7:
              $ctx.state = (predicate(item)) ? 1 : 15;
              break;
            case 1:
              $ctx.state = 2;
              return item;
            case 2:
              $ctx.maybeThrow();
              $ctx.state = 15;
              break;
            default:
              return $ctx.end();
          }
      }, $__6, this);
    });
    var take = $traceurRuntime.initGeneratorFunction(function $__7(items, number) {
      var count,
          $__2,
          $__3,
          item;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              count = 0;
              $ctx.state = 27;
              break;
            case 27:
              $ctx.state = (number < 1) ? 1 : 2;
              break;
            case 1:
              $ctx.state = -2;
              break;
            case 2:
              $__2 = items[$traceurRuntime.toProperty(Symbol.iterator)]();
              $ctx.state = 22;
              break;
            case 22:
              $ctx.state = (!($__3 = $__2.next()).done) ? 17 : -2;
              break;
            case 17:
              $ctx.pushTry(15, null);
              $ctx.state = 18;
              break;
            case 18:
              throw undefined;
              $ctx.state = 20;
              break;
            case 20:
              $ctx.popTry();
              $ctx.state = 22;
              break;
            case 15:
              $ctx.popTry();
              item = $ctx.storedException;
              $ctx.state = 13;
              break;
            case 13:
              item = $__3.value;
              $ctx.state = 14;
              break;
            case 14:
              $ctx.state = 5;
              return item;
            case 5:
              $ctx.maybeThrow();
              $ctx.state = 7;
              break;
            case 7:
              count += 1;
              $ctx.state = 12;
              break;
            case 12:
              $ctx.state = (count >= number) ? 8 : 22;
              break;
            case 8:
              $ctx.state = -2;
              break;
            default:
              return $ctx.end();
          }
      }, $__7, this);
    });
    var count = 0;
    var company = new Company();
    company.addEmployees("Tim", "Sue", "Joy", "Tom");
    for (var $__2 = take(filter(company, (function(e) {
      return e[0] == 'T';
    })), 1)[$traceurRuntime.toProperty(Symbol.iterator)](),
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
    expect(count).toBe(1);
  });
  it("can take a parameter from next(param)", function() {
    var range = $traceurRuntime.initGeneratorFunction(function $__5(start, end) {
      var current,
          delta;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              current = start;
              $ctx.state = 18;
              break;
            case 18:
              $ctx.state = (current <= end) ? 9 : -2;
              break;
            case 9:
              $ctx.pushTry(7, null);
              $ctx.state = 10;
              break;
            case 10:
              throw undefined;
              $ctx.state = 12;
              break;
            case 12:
              $ctx.popTry();
              $ctx.state = 18;
              break;
            case 7:
              $ctx.popTry();
              delta = $ctx.storedException;
              $ctx.state = 1;
              break;
            case 1:
              $ctx.state = 2;
              return current;
            case 2:
              delta = $ctx.sent;
              $ctx.state = 4;
              break;
            case 4:
              current += delta || 1;
              $ctx.state = 18;
              break;
            default:
              return $ctx.end();
          }
      }, $__5, this);
    });
    var range2 = function(start, end) {
      var current = start;
      var first = true;
      return {next: function() {
          var delta = arguments[0] !== (void 0) ? arguments[0] : 1;
          var result = {
            value: undefined,
            done: true
          };
          if (!first) {
            current += delta;
          }
          if (current <= end) {
            result.value = current;
            result.done = false;
          }
          first = false;
          return result;
        }};
    };
    var result = [];
    var iterator = range2(1, 10);
    var next = iterator.next();
    while (!next.done) {
      result.push(next.value);
      next = iterator.next(2);
    }
    expect(result).toEqual([1, 3, 5, 7, 9]);
  });
});

//# sourceMappingURL=generators.js.map