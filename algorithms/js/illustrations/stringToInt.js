function atoi(str){
    return parseInt(str);
}

console.log(atoi('123')); //123
console.log(atoi('-123')); //-123
console.log(atoi('-123Extra')); //-123
console.log(atoi('123.456')); // 123
console.log(atoi('Does not start with a digit 123')); //NAN


//better with regex
function atoi(str){
    if(/^\-?([0-9]+)$/.test(str))
         return parseInt(str);
}
console.log("");
console.log("Better with Regex")
console.log(atoi('123')); //123
console.log(atoi('-123')); //-123
console.log(atoi('-123Extra')); //NAN
console.log(atoi('123.456')); // 123
console.log(atoi('Does not start with a digit 123')); //NAN


//Implement parseint internally.
function atoi(str){
    // help to get a string to number value
    const zeroCode = '0'.charCodeAt(0);
    let sign = 1;
    if(str[0] === '-'){
        str = str.substring(1);
        sign = -1;
    }
    let acc = 0;
    for(const char of str){
        acc = acc*10 + (char.charCodeAt(0) - zeroCode);
    }
    return sign * acc

}
console.log("");
console.log("Better with Regex")
console.log(atoi('123')); //123
console.log(atoi('-123')); //-123
console.log(atoi('-123Extra')); //NAN
console.log(atoi('123.456')); // 123
console.log(atoi('Does not start with a digit 123')); //NAN