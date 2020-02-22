class Fibber {
  constructor() {
    this.memo = {};
  }

  fib(n) {
    if (n < 0) {
      throw new Error('Index was negative. No such thing as a negative index in a series.');

    // Base cases
    } else if (n === 0 || n === 1) {
      return n;
    }

    // See if we've already calculated this
    if (this.memo.hasOwnProperty(n)) {
      console.log(`grabbing memo[${n}]`);
      return this.memo[n];
    }

    console.log(`computing fib(${n})`);
    const result = this.fib(n - 1) + this.fib(n - 2);

    // Memoize
    this.memo[n] = result;

    return result;
  }

  fibSlow(n) {
    if (n < 2) {
      return n;
    } else {
      return this.fibSlow(n - 2) + this.fibSlow(n - 1);
    }
  }

  calculateFibAt(n){
    let memoTable = [0, 1];
    for (var i = 2; i <= n; i++) {
      memoTable.push(memoTable[i - 2] + memoTable[i - 1])
    }
    return memoTable;
  };
}


let fib = new Fibber();
console.log(fib.fib(10));

