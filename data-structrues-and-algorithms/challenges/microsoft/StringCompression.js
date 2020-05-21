function compress(data) {
  let counter = 1;
  let result = "";
  let startIndex = 0,
    nextIndex = 1;
  for (; nextIndex < data.length; nextIndex++) {
    if (data[startIndex] == data[nextIndex]) counter++;
    else {
      result += data[startIndex] + counter.toString();
      startIndex = nextIndex;
      counter = 1;
    }
  }
  result += data[startIndex] + counter.toString();
  return result;
}
let data = "abbcccccda";
console.log(compress(data));
