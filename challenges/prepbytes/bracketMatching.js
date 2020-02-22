function isValid(code) {
  const openersToClosers = {
    "(": ")",
    "[": "]",
    "{": "}"
  };
  let length = code.length;
  if (length % 2 != 0) return false;
  let mid = Math.floor(length / 2);
  for (let i = 0; i <= mid; i++) {
    if (openersToClosers[code.charAt(i)] != code.charAt( i + 1)) {
      if (openersToClosers[code.charAt(i)] != code.charAt(length - i - 1))
        return false;
    }else{
      i++
    }
  }
  return true;
}

console.log(isValid("({[][]})"));
