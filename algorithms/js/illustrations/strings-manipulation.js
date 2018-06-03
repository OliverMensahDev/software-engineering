//CHALLENGE 1: REVERSE A STRING
function reverseString(str){
    if(str === undefined){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    // let revString = '';
    // for( let i= str.length - 1; i>=0; i--){
    //     revString += str[i]
    // }
    // return revString;

    // let revString = '';
    // for( let i= 0; i <= str.length - 1; i++){
    //     revString = str[i] + revString
    // }
    // return revString;

    // return str.split('').reverse().join('')

    return str.split('').reduce((revString, char) => char + revString, '');
}


function isPalindrome(str){
    if(str === undefined){
        throw new Error("Add A Word");
    }
    if( typeof str !== 'string') {
        throw new Error("Must be a string")
    }
    let reverse = str.split('').reverse().join('');
    return reverse === str ? true: false
}


function reverseInt( int){
    if(int === undefined){
        throw new Error("Add A Number");
    }
    if( typeof int !== 'number') {
        throw new Error("Must be a Number")
    }

   return  parseInt(int.toString().split('').reverse().join(''))  * Math.sign(int)
}


function capitaliseLetters(str){
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


function bracketMatch(text) {
    let count = 0;
    let numToAdd = 0;    
    for (let i = 0; i < text.length; i++) {
      if (text.charAt(i) === '(') count++;
      if (text.charAt(i) === ')') count--;
      if (count < 0) numToAdd++;
    }    
    count = 0;
    for (let j = text.length - 1; j >= 0; j--) {
      if (text.charAt(j) === ')') count++;
      if (text.charAt(j) === '(') count--;
      if (count < 0) numToAdd++;
    }
    return numToAdd;
  }
  
  console.log(bracketMatch('(()'));
  console.log(bracketMatch('(())'));
  console.log(bracketMatch('((()))('));
