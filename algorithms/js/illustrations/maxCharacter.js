function maxCharacter(str){
    let maxNum = 0;
    let maxChar 
    const charMap ={}
    str.replace(/\s/g, '').split('').forEach(char=>{
        if(charMap[char]){
            charMap[char]++
        }else{
            charMap[char] = 1
        }
    })
    for( let char in charMap){
        //debugger;
        if(charMap[char] > maxNum){
            maxNum = charMap[char]
            maxChar = char
        }
    }
    return maxChar;
}

console.log(maxCharacter("This man is here"))
