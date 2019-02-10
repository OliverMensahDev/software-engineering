"use strict";

var pegasus = function pegasus(name) {
  this.name = name;
  this.wings = true;
};

var p = new pegasus("Alex");
console.log(p.name);
"use strict";

var unicorn = function unicorn(name) {
  this.name = name;
  this.horn = true;
};

var u = new unicorn("bob");
console.log(u.name);
