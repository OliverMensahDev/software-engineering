function isValid(code) {
  let stack = [];
  const OPENINGS = '{([';
  const CLOSINGS = '})]';
  for (let i = 0; i < code.length; i++) {
    let letter = code.charAt(i);
    if (OPENINGS.includes(letter)) stack.push(letter);
    else if (CLOSINGS.includes(letter)) {
      if (stack.length === 0) return false;
      let top = stack[stack.length - 1];
      if (OPENINGS.indexOf(top) === CLOSINGS.indexOf(letter)) stack.pop();
    }
  }
  return stack.length === 0;
}
console.log(isValid('{)[]()'));
