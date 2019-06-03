function pattern(n){
    while(n > 0){
        res = ""
        for(i = 1; i <= n; i++){
            res += "#"
        }
        console.log(res);
        n--
    }    
}

pattern(8)