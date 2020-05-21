//CHALLENGE 1: REVERSE A STRING
function reverseString(str){
    if(str === undefined){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    /*
    //using loops
    let revString = '';
    for( let i= str.length - 1; i >= 0; i--){
        revString += str[i]
    }
    return revString;

    let revString = '';
    for( let i= 0; i <= str.length - 1; i++){
        revString = str[i] + revString
    }
    return revString;
    */

    /*
    //using reverse of an array
    return str.split('').reverse().join('')
    */

    //using reduce of an array
    return str.split('').reduce((revString, char) => char + revString, '');

}

console.log(reverseString("data"))