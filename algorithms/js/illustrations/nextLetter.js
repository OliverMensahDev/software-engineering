function letterChanges(str){
    return str.toLowerCase().replace(/[a-z]/gi, char =>{
        if(char === 'z'){
            return 'a';
        }else{
            return String.fromCharCode(char.charCodeAt() +1)
        }
    });

}
console.log(letterChanges(""));

