const calculateFibAt = (n) => {
  var memoTable = [0, 1];
  for (var i = 2; i <= n; i++) {
    memoTable.push(memoTable[i - 2] + memoTable[i - 1])
  }
  return memoTable;
};
console.log(calculateFibAt(10));



//slow, recursive way
var fibCount = 0;
const fibSlow = n => {
  fibCount++;
  if (n < 2) {
    return n;
  } else {
    return fibSlow(n - 2) + fibSlow(n - 1);
  }
}
for (i = 0; i <= 10; i++) {
  console.log("The fibonnaci of " + i + " is " + fibSlow(i) + "; it took " + fibCount + " calls  to  get here");
}
