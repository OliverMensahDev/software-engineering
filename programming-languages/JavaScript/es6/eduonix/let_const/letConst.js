"use strict" ;

function checkVar(){
    var x = 10
    if(true){
        var x = 30;
        console.log(x)
    }
    console.log(x)
}

function checkLet(){
    let x = 10;
    if(true){
        let x = 30;
        console.log(x)
    }
    console.log(x)
}

 checkVar();
 checkLet();