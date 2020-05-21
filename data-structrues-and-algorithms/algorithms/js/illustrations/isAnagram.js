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

console.log(isAnagram("Oliver", "livero"))