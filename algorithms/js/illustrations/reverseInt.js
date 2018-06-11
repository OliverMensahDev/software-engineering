
function reverseInt( int){
    if(int === undefined){
        throw new Error("Add A Number");
    }
    if( typeof int !== 'number') {
        throw new Error("Must be a Number")
    }

   return  parseInt(int.toString().split('').reverse().join(''))  * Math.sign(int)
}

console.log(reverseInt(-123));