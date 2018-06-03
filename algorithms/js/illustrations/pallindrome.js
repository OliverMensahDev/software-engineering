function isPallindrome(data){
    //iremove special 
    var removeChars = data.replace(/[^A-Z0-9]/ig, "").toLowerCase();
    //revese
    var checkPallindrome = removeChars.split("").reverse().join("");
    if(removeChars === checkPallindrome){
        return true;
    }
}

console.log(isPallindrome("MADAM"));