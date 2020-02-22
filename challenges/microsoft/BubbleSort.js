function sort(data) {
  let doItAgain = false;
  let limit = data.length;
  let nextDefaultValue = Number.POSITIVE_INFINITY;
  for (let i = 0; i < limit; i++) {
    let currentValue = data[i];
    let nextValue = i + 1 < limit ? data[i + 1] : nextDefaultValue;
    if (nextValue < currentValue) {
      data[i] = nextValue;
      data[i + 1] = currentValue;
      doItAgain = true;
    }
  }
  if (doItAgain) sort(data);
  return data;
}

function print(data) {
  let res = "[";
  for (let i = 0; i < data.length; i++) {
    res += data[i];
    if (i < data.length - 1) res += ",";
  }
  res +="]";
  console.log(res);
}

let a = [1,-1, 0, -2, 4];
let res = sort(a);
print(res)