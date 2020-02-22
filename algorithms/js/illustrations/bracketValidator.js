function isValid(code) {
  const openersToClosers = {
    "(": ")",
    "[": "]",
    "{": "}"
  };
  // const openers = new Set(['(', '[', '{']);
  // const closers = new Set([')', ']', '}']);

  // const openersStack = [];
  // for (let i = 0; i < code.length; i++) {
  //     const char = code.charAt(i);
  //     if (openers.has(char)) {
  //         openersStack.push(char);
  //     } else if (closers.has(char)) {
  //         if (openersStack.length === 0) {
  //                 return false;
  //         }
  //         const lastUnclosedOpener = openersStack.pop();
  //         // If this closer doesn't correspond to the most recently
  //         // seen unclosed opener, short-circuit, returning false
  //         if (openersToClosers[lastUnclosedOpener] !== char) {
  //             return false;
  //         }
  //     }
  // }
  // return openersStack.length === 0;

  let length = code.length;
  if (length % 2 != 0) return false;
  let mid = Math.floor(length / 2);
  for (let i = 0; i <= mid; i++) {
    if (openersToClosers[code.charAt(i)] != code.charAt( i + 1)) {
      console.log(i, code.charAt(i), openersToClosers[code.charAt(i)]);
      if (openersToClosers[code.charAt(i)] != code.charAt(length - i - 1))
        return false;
    }else{
      i++
    }
  }
  return true;
}

console.log(isValid("{[]()}"));
