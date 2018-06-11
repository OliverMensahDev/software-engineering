function sideEffects(data){
    const newData = data.sort((a,b) => a -b)
    return newData;
}
const original = [10,1, 4, 2];
const newData = sideEffects(original);

console.log(original)
console.log(newData)
