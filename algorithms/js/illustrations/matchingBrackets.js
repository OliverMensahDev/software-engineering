

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

  function bracketMatch(text){
    let length = text.length;
    let unMatched = 0
    let mid = Math.floor(length/2);
    if(length % 2 != 0) unMatched = 1;
    for(i= 0;  i < mid ; i++){
      length = length -1;
      console.log("comparing ", text.charAt(i), text.charAt(length))
      if(text.charAt(i) === text.charAt(length)) unMatched++;
    }
    return unMatched;
  }
  
  console.log(bracketMatch('(()'));
  console.log(bracketMatch('(())'));
  console.log(bracketMatch('((()))('));
