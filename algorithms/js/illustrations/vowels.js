function countVowels(str){
    if(str == ""){
        return "Please Enter Data";
    }
    vowels = "aeiou";
    let count = 0;
    let str = str.toLowerCase();
    let length = str.length;
    for(let i = 0; i< length; i++){
        if(vowels.includes(str[i])){
            count++;
        }
    }
    console.log(count);
}

countVowels("OLIVER is my NamE");