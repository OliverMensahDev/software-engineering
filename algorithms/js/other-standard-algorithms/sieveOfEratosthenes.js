const sieve = (n) => {
    grid = {};
    for (i = 2; i <= n; i++) {
        grid[i] = { marked: false };
    }
    //console.log(grid)
    const limit = Math.sqrt(n)
    for (i = 2; i <= limit; i++) {
        for (x = i + i; x <= n; x += i) {
            grid[x].marked = true
        }
    }
    var out = [];
    for (i = 2; i <= n; i++) {
        if (!grid[i].marked) {
            out.push(i)
        }
    }
    return out;
}
console.log(sieve(100));