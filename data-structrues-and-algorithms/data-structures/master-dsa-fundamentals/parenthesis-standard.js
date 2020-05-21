function peek(stack){
  return stack[stack.length - 1]
}

function isBalanced(str){
  let OPENING = "({["
  let CLOSING = ")}]"
  let stack = []

  for(let i=0; i< str.length; i++){
    let letter  = str.charAt(i)
    if(OPENING.includes(letter)){
      stack.push(letter)
    }else if(CLOSING.includes(letter)){
      if(stack.length === 0) return false
      else{
        let top = peek(stack)
        if(
          top === "(" && letter === ")" ||
          top === "{" && letter === "}" ||
          top === "[" && letter === "]"){
            stack.pop()
        }else{
          return false
        }
      }
    }
  }
  return stack.length === 0
}

//better
function isBalanced(str){
  let OPENING = "({["
  let CLOSING = ")}]"
  let stack = []

  for(let i=0; i< str.length; i++){
    let letter  = str.charAt(i)
    if(OPENING.includes(letter)){
      stack.push(letter)
    }else if(CLOSING.includes(letter)){
      if(stack.length === 0) return false
      else{
        let top = peek(stack)
        if(OPENING.indexOf(top) === CLOSING.indexOf(letter)){
            stack.pop()
        }else{
          return false
        }
      }
    }
  }
  return stack.length === 0
}