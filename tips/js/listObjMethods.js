const getMethods = (obj) => {
    let properties = new Set()
    let currentObj = obj
    do {
      Object.getOwnPropertyNames(currentObj).map(item => properties.add(item))
    } while ((currentObj = Object.getPrototypeOf(currentObj)))
    return [...properties.keys()].filter(item => typeof obj[item] === 'function')
  }

console.log(getMethods(""));
console.log(getMethods(new String('test')));
console.log(getMethods({}));
console.log(getMethods(Date.prototype));
