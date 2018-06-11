

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
