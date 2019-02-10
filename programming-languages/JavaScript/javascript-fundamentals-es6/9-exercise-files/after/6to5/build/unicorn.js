"use strict";

var unicorn = function unicorn(name) {
  this.name = name;
  this.horn = true;
};

var u = new unicorn("bob");
console.log(u.name);