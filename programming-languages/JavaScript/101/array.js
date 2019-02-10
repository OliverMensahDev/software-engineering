let data = [1,3,4,5];

console.clear()

const append = (array, value)=> {
    //array.concat(value)
     return [...array, value]
}
console.log(`Append ${append(data,6).join()}`);

const prepend = (array, value)=> {
    //[value].concat(array)
    return [value, ...array]
}
console.log(`prepend ${prepend(data,6).join()}`);

const insertArt = (array, value, index) => {
    // res = [].concat(array.slice(0, index), value, array.slice(index))
    res = [...array.slice(0, index), value, ...array.slice(index)].join();
    return res;
}
console.log(`InsertAt ${insertArt(data,6, 2)}`);

const removeAt = (array, index) => {
    //res = [].concat(array.slice(0, index),array.slice(index +1))
    res = [...array.slice(0, index), ...array.slice(index +1)].join();
    return res;
}
console.log(`removeAt ${removeAt(data, 2)}`);


console.log(`Data ${data.join()}`)