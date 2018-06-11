function letterChanges(str){
    return str.toLowerCase().replace(/[a-z]/gi, char =>{
        if(char === 'z' || char ==='Z'){
            return 'a';
        }else{
            return String.fromCharCode(char.charCodeAt() +1)
        }
    }).replace(/a|e|i|o|u/gi, vowel=>{
        return vowel.toUpperCase();
    })

}
console.log(letterChanges("I am"));

