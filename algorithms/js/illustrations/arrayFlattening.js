function flattenArray(arrays) {
    //[].concat.apply([],arrays);
    return arrays.reduce((acc, each)=> acc.concat(each), []);
}
console.log(flattenArray([[1,2], [2,5]]))