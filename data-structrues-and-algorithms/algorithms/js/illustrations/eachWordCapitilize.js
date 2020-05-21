function eachWordCapitilize(str){
    if(str === undefined){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    // return str.replace(/\b[a-z]/gi, function(char){
    //     return char.toUpperCase()
    // }) 
    return str 
        .toLowerCase()
        .split(' ')
        .map(word => word[0].toUpperCase()+word.substr(1))
        .join(' ')
}
console.log(eachWordCapitilize("I am coming home next week"));