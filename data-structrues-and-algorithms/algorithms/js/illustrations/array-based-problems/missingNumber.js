function getMissingNumberA( numbers,totalCount) {
    let expectedSum = totalCount * ((totalCount + 1) / 2);
    let  actualSum = 0;
    for (let i of numbers) {
        actualSum += i;
    }
    return expectedSum - actualSum;
}

function getMissingNumberB( numbers,totalCount) {
    let expectedSum = totalCount * ((totalCount + 1) / 2);
    actualSum = numbers.reduce((acc, current)=> acc + current, 0)
    return expectedSum - actualSum;
}

data = [11, 12, 13, 15];
console.log(getMissingNumberA(data, 5));
