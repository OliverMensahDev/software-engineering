function isPalindrome(data){
    //remove special 
    var removeChars = data.replace(/[^A-Z0-9]/ig, "").toLowerCase();
    //reverse
    var checkPalindrome = removeChars.split("").reverse().join("");
    return removeChars === checkPalindrome;
}

function isPalindrome1(str){
    if(str === undefined){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    let reverse = str.split('').reverse().join('');
    return reverse === str;
}

console.log(isPalindrome1("MADAM"));