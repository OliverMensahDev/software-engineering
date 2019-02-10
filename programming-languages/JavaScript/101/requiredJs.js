function require(){
    throw new Error("The Parameter is required");
}

function square(a= require(), b= require()){
    return a*b;
}

console.log(square(3, 6))