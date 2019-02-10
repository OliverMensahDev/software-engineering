"use strict";
describe("comprehensions", function() {
  it("can create arrays or generators", function() {
    var range = $traceurRuntime.initGeneratorFunction(function $__9(start, end) {
      var current;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              current = start;
              $ctx.state = 9;
              break;
            case 9:
              $ctx.state = (current <= end) ? 1 : -2;
              break;
            case 1:
              $ctx.state = 2;
              return current;
            case 2:
              $ctx.maybeThrow();
              $ctx.state = 4;
              break;
            case 4:
              current += 1;
              $ctx.state = 9;
              break;
            default:
              return $ctx.end();
          }
      }, $__9, this);
    });
    var numbers = [];
    for (var $__4 = [1, 2, 3][$traceurRuntime.toProperty(Symbol.iterator)](),
        $__5; !($__5 = $__4.next()).done; ) {
      try {
        throw undefined;
      } catch (n) {
        n = $__5.value;
        {
          numbers.push(n * n);
        }
      }
    }
    expect(numbers).toEqual([1, 4, 9]);
    var numbers = (function() {
      var $__2 = 0,
          $__3 = [];
      for (var $__6 = [1, 2, 3][$traceurRuntime.toProperty(Symbol.iterator)](),
          $__7; !($__7 = $__6.next()).done; ) {
        try {
          throw undefined;
        } catch (n) {
          n = $__7.value;
          if (n > 1)
            $traceurRuntime.setProperty($__3, $__2++, n * n);
        }
      }
      return $__3;
    }());
    expect(numbers).toEqual([4, 9]);
    var numbers2 = ($traceurRuntime.initGeneratorFunction(function $__10() {
      var $__6,
          $__7,
          n;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              $__6 = [1, 2, 3][$traceurRuntime.toProperty(Symbol.iterator)]();
              $ctx.state = 4;
              break;
            case 4:
              $ctx.state = (!($__7 = $__6.next()).done) ? 5 : -2;
              break;
            case 5:
              n = $__7.value;
              $ctx.state = 6;
              break;
            case 6:
              $ctx.state = 2;
              return n * n;
            case 2:
              $ctx.maybeThrow();
              $ctx.state = 4;
              break;
            default:
              return $ctx.end();
          }
      }, $__10, this);
    })());
    expect(Array.from(numbers2)).toEqual([1, 4, 9]);
  });
  it("can be used with yield*", function() {
    var $__1;
    var Company = function Company() {
      this.employees = [];
    };
    ($traceurRuntime.createClass)(Company, ($__1 = {}, Object.defineProperty($__1, "addEmployees", {
      value: function() {
        for (var names = [],
            $__8 = 0; $__8 < arguments.length; $__8++)
          $traceurRuntime.setProperty(names, $__8, arguments[$traceurRuntime.toProperty($__8)]);
        this.employees = this.employees.concat(names);
      },
      configurable: true,
      enumerable: true,
      writable: true
    }), Object.defineProperty($__1, Symbol.iterator, {
      value: $traceurRuntime.initGeneratorFunction(function $__9() {
        var $__4,
            $__5,
            e;
        return $traceurRuntime.createGeneratorInstance(function($ctx) {
          while (true)
            switch ($ctx.state) {
              case 0:
                $__4 = this.employees[$traceurRuntime.toProperty(Symbol.iterator)]();
                $ctx.state = 16;
                break;
              case 16:
                $ctx.state = (!($__5 = $__4.next()).done) ? 11 : -2;
                break;
              case 11:
                $ctx.pushTry(9, null);
                $ctx.state = 12;
                break;
              case 12:
                throw undefined;
                $ctx.state = 14;
                break;
              case 14:
                $ctx.popTry();
                $ctx.state = 16;
                break;
              case 9:
                $ctx.popTry();
                e = $ctx.storedException;
                $ctx.state = 7;
                break;
              case 7:
                e = $__5.value;
                $ctx.state = 8;
                break;
              case 8:
                console.log("yield", e);
                $ctx.state = 6;
                break;
              case 6:
                $ctx.state = 2;
                return e;
              case 2:
                $ctx.maybeThrow();
                $ctx.state = 16;
                break;
              default:
                return $ctx.end();
            }
        }, $__9, this);
      }),
      configurable: true,
      enumerable: true,
      writable: true
    }), $__1), {});
    var filter = $traceurRuntime.initGeneratorFunction(function $__10(items, predicate) {
      var $__12,
          $__13;
      return $traceurRuntime.createGeneratorInstance(function($ctx) {
        while (true)
          switch ($ctx.state) {
            case 0:
              $__12 = ($traceurRuntime.initGeneratorFunction(function $__11() {
                var $__4,
                    $__5,
                    item;
                return $traceurRuntime.createGeneratorInstance(function($ctx) {
                  while (true)
                    switch ($ctx.state) {
                      case 0:
                        $__4 = items[$traceurRuntime.toProperty(Symbol.iterator)]();
                        $ctx.state = 4;
                        break;
                      case 4:
                        $ctx.state = (!($__5 = $__4.next()).done) ? 6 : -2;
                        break;
                      case 6:
                        item = $__5.value;
                        $ctx.state = 7;
                        break;
                      case 7:
                        $ctx.state = (predicate(item)) ? 1 : 4;
                        break;
                      case 1:
                        $ctx.state = 2;
                        return item;
                      case 2:
                        $ctx.maybeThrow();
                        $ctx.state = 4;
                        break;
                      default:
                        return $ctx.end();
                    }
                }, $__11, this);
              })())[$traceurRuntime.toProperty(Symbol.iterator)]();
              $ctx.sent = void 0;
              $ctx.action = 'next';
              $ctx.state = 12;
              break;
            case 12:
              $__13 = $__12[$traceurRuntime.toProperty($ctx.action)]($ctx.sentIgnoreThrow);
              $ctx.state = 9;
              break;
            case 9:
              $ctx.state = ($__13.done) ? 3 : 2;
              break;
            case 3:
              $ctx.sent = $__13.value;
              $ctx.state = -2;
              break;
            case 2:
              $ctx.state = 12;
              return $__13.value;
            default:
              return $ctx.end();
          }
      }, $__10, this);
    });
    var take = $traceurRuntime.initGeneratorFunction(function $__11(items, number) {
      var count,
          $__4,
          $__5,
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
              $__4 = items[$traceurRuntime.toProperty(Symbol.iterator)]();
              $ctx.state = 22;
              break;
            case 22:
              $ctx.state = (!($__5 = $__4.next()).done) ? 17 : -2;
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
              item = $__5.value;
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
      }, $__11, this);
    });
    var count = 0;
    var company = new Company();
    var found = undefined;
    company.addEmployees("Tim", "Sue", "Joy", "Tom");
    for (var $__4 = take(filter(company, (function(e) {
      return e[0] == 'S';
    })), 1)[$traceurRuntime.toProperty(Symbol.iterator)](),
        $__5; !($__5 = $__4.next()).done; ) {
      try {
        throw undefined;
      } catch (employee) {
        employee = $__5.value;
        {
          count += 1;
          found = employee;
          console.log("got", employee);
        }
      }
    }
    expect(count).toBe(1);
    expect(found).toBe("Sue");
  });
});

//# sourceMappingURL=comprehensions.js.map