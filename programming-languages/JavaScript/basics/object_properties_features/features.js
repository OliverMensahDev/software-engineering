var obj ={ name: "oliver"};
obj.age = 32;
obj.gender = "female";
console.log(Object.getOwnPropertyDescriptor(obj, "name"));
Object.defineProperty(obj, "flameWar",{
  value:"Angular2 vs Reactjs",
  writeable:true,
  configurable:true,
  enumerable:false
});
console.log(obj.propertyIsEnumerable('flameWar'));
console.log(obj.propertyIsEnumerable('age'));
for (let prop in obj) {
    console.log(prop);
  }
