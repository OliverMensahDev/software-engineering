'use strict'

function doSomething(params = "Oliver"){
    console.log(params);
}
doSomething();

function saySomething(){
    console.log("Me");
}

function getIt(me=saySomething()){
    console.log(me)
}

getIt();