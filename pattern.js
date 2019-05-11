function pattern(n){
    called = 0
    while(n > 0){
        called++
        res = ""
        for(i = 1; i <= n; i++){
            res += "#"
            called++
        }
        console.log(res);
        n--
    }
    console.log(called);
    
}

pattern(8)