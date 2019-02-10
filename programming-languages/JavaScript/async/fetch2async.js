const fetch =  require('node-fetch');
function getUser(username) {
    const url = `https://api.github.com/users/${username}`;
    fetch(url)
         .then(response =>{
             return response.json();
         })
         .then(data =>{
             console.log("User name", data.name);
             console.log("User Location", data.location);
         })
         .catch(error => console.log('ERROR:', error.message));
}
getUser("OMENSAH");

//converting to async
async  function getUser1(username) {
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    const user = await response.json();
    console.log(user.name);
    console.log(user.location);
}
getUser1("OMENSAH");




//converting to async with error handling
async  function getUser2(username) {
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    const users = await response.json();
    if(response.status  !== 200)
      throw Error(users.message);
     return users;
}
getUser2("OMENSAH1")
.then(data=>{
    console.log(data.name);
    console.log(data.location);
})
.catch((err) => {console.error("Error Ocurred", err.message);})
