"use strict";

var pegasus = function pegasus(name) {
  this.name = name;
  this.wings = true;
};

var p = new pegasus("Alex");
console.log(p.name);