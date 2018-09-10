class String{
    //A Hamming distance in information technology represents the number of points at 
    //which two corresponding pieces of data can be different
    hammingDistance(a, b) {
        if (a.length !== b.length) {
          throw new Error('Strings must be of the same length');
        }
        let distance = 0;
      
        for (let i = 0; i < a.length; i += 1) {
          if (a[i] !== b[i]) {
            distance += 1;
          }
        }
      
        return distance;
    }
    //strings to int
    atoi(str){
        // if(/^\-?([0-9]+)$/.test(str)) return parseInt(str);
        // help to get a string to number value
        const zeroCode = '0'.charCodeAt(0);
        let sign = 1;
        if(str[0] === '-'){
            str = str.substring(1);
            sign = -1;
        }
        let acc = 0;
        for(const char of str){
            acc = acc*10 + (char.charCodeAt(0) - zeroCode);
        }
        return sign * acc
    }
}


let s = new String();
console.log(s.hammingDistance("Oliver", "rivelO"));