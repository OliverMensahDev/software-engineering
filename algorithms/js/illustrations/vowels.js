function countVowels(str){
    if(str == ""){
        return "Please Enter Data";
    }
    vowels = "aeiou";
    var count = 0;
    var str = str.toLowerCase();
    console.log(str);
    for(let i = 0; i< str.length; i++){
        if(vowels.includes(str[i])){
            count++;
        }
    }
    console.log(count);
}

countVowels("OLIVER is my NamE");