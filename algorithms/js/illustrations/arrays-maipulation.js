function longest(str) {
    if(str == undefined) {
        return "Add A String";
    }
    if(typeof str !== 'string') {
        return " It must be a string";
    }
    let sorted = str.split(' ').sort((a,b)=> b.length - a.length)
    let longest = sorted.filter((word)=>sorted[0].length === word.length ).join(' ')
    return longest;
}

function chunkArray(arr, len){
      //int chunk array
      const chunkedArr = []
      // set index
      let i = 0;
      while( i< arr.length){
        chunkedArr.push(arr.slice(i,  i+ len))
          i+= len
      }
      return chunkedArr;
}

function flattenArray(arrays) {
    //[].concat.apply([],arrays);
    return arrays.reduce((acc, each)=>acc.concat(each));
}

function isAnagram(str1, str2){
    return helper(str1) === helper(str2)
}
function helper(str){
    return str 
        .replace(/'[^\w]'/g, '')
        .toLowerCase()
        .split('')
        .sort()
        .join('');
}

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

console.log(longest("I love my father and my mother  but the best is my"));
console.log(chunkArray([1,2,3,4,5,6,8], 3))
console.log(flattenArray([[1,2], [2,5]]))
console.log(isAnagram("Oliver", "livero"))
console.log(letterChanges("I am"));

