function condense(sequence){
  let mainStack = sequence.split("")
  let anotherStack = [mainStack.pop()]

  while(mainStack.length >0){
    let left = mainStack.pop()
    let right = anotherStack.pop()
    if(left !== right){
      anotherStack.push(right)
      anotherStack.push(left)
    }
  }

  while(anotherStack.length > 0){
    mainStack.push(anotherStack.pop())
  }
  return mainStack.join("")
}


console.log(condense("54344346"))