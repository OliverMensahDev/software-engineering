function peek(stack){
  return stack[stack.length -1]
}

function isBalanced(str){
  let stack = []
  stack.push()
  stack.pop()
  
  for(let i =0; i < str.length; i++){
    let letter = str.charAt(i)
    if(letter === "("){
      stack.push(letter)
    }else  if(letter === ")"){
      if(peek(stack) ==="("){
        stack.pop()
      }else{
        return false
      }
    }
  }
  return stack.length === 0
}


console.log(isBalanced("((()))"));

