const sumContigousNumbersA = (array) => {
    return array.reduce((acc, cur) => acc + cur, 0);
}

const sumContigousNumbersB = (array) => {
    let lastElement = array[array.length -1];
    return lastElement * (lastElement + 1)/2 ;
}


const a = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12,13]
console.log(sumContigousNumbersB(a));
