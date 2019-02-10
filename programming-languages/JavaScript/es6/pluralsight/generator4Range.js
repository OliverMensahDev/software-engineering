let range = function*(start, end){
    let current = start;
    while(current <= end){
        let currentValue = yield current;
        current += currentValue || 1;
    }
}

let result = [];
let iterator = range(1, 10);
let next = iterator.next();
while(!next.done){
    result.push(next.value);
    next = iterator.next(4);
}
console.log(result);
