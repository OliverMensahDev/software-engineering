const sieve = (n) => {
    let grid = {};
    let limit = Math.sqrt(n)
    for(let i = 2; i <= n ; i++){
        grid[i] = {marked: false};
    }
    called =  0;
    for(let i = 2; i <= limit ; i++){
        called++
        for(let x = i + i; x <= n; x += i){
            called++
            grid[x].marked = true;
        }
    }
    let out = [];
    for(let i = 2;  i <= n; i++){
        if(!grid[i].marked) out.push(i) 
    }
    return out;
}


console.log(sieve(100));
