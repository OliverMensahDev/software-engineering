'use strict';

const fs = require('fs');

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', function(inputStdin) {
    inputString += inputStdin;
});

process.stdin.on('end', function() {
    inputString = inputString.split('\n');

    main();
});

function readLine() {
    return inputString[currentLine++];
}



/*
 * Complete the 'analyzeInvestments' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts STRING s as parameter.
 */

function analyzeInvestments(s) {
  let res =  subString(s)
  return res;
  let count = 0
  let accendingStact = ["A", "B", "C"]
  let descendingStack = ["C", "B", "A"]
   for(let i = 0 ; i < res.length; i++){
       if(s == res[i]){
           
       }   
   }
   return count;
}

function subString(s){
     let i, j, res=[]
     for(i=0; i < s.length; i++){
         for(j=i+1;  j<s.length +1; j++){
             res.push(s.slice(i, j))
         }
     }
     return res;
}

console.log(analyzeInvestments("abc"));