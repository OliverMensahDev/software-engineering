// synchronous program is a program in which if it has two codes L1 followed by L2,
// L2 cannot beginning running
//until L1 has finished executing

//asynchronous prograam  is a program in which if it has two codes L1 followed by L2 and
//L1 has been scheduled some task to be run on //the future, L2 then executes before wihout
//Lwaiting for L1 to finish

//asynchronous does not mean same thing at the same time or multithreaded.

//eg with setTimeout

console.log("Hello ");

setTimeout(function(){
    console.log("Delayed");
}, 2000);
console.log("Not delayed");

// normal flow is  Hello  Delayed Not Delayed
//But setTimeout only set some task to be perfomed in the future.
//NB it does not stop the program


// requesting data from server and then return some data
const fetch =  require('node-fetch');
function getUser(username) {
    const url = `https://api.github.com/users/${username}`;
    var me;
    fetch(url)
         .then(response =>{
             return response.json();
         })
         .then(data =>{
            me =  "User name" + data.name;
         })
         return me ;
}
var data = getUser("OMENSAH");
console.log(data);
//above is undefined because  me is assigned once the request finish and since it has been scheduled,
// return me is callled earlier and thus why  we have that

// solution
const fetch =  require('node-fetch');
function getUser(username) {
    const url = `https://api.github.com/users/${username}`;
    var me;
    fetch(url)
         .then(response =>{
             return response.json();
         })
         .then(data =>{
            me =  "User name" + data.name;
            return me
         })
}
var data = getUser("OMENSAH");
console.log(data);


//u can presvent that with passing call back function or thenable in Promiessed


//using the async approcah
// async works with promise returning value or  non promise values that are resolve to be promise objects like //resolve(45)
function getIt(){
    x =  Promise.resolve(5).then(x=>{
        console.log(x);
    })
}
getIt();
async function get(){
    const x = await 42;
    console.log(x);
}
get();
