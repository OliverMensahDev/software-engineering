//sync
function add(x, y) {
    return x +y
}

let thunks = function() {
    return add(10, 25)
}

//async
function addAsync(x, y, cb){
    setTimeout(function(){
        cb(x+y);
    }, 1000)
}
var thunk = function(cb){
    addAsync(10, 15, cb);
}
thunk(function(sum){
    console.log(sum);
})