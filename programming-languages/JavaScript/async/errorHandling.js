// if the user does not exist then there is error
//1
const fetch =  require('node-fetch');
async  function getUser(username) {
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    const body  =  await response.json();
    if(response.status  !== 200 )
        throw Error(body.message);
    return body;
}
getUser("OMENSAH1")
  .then(function(data){
      console.log(data.name);
      console.log(data.location);
  })
  .catch((err) => {console.error(`Error:  ${err.message}` )})


//2
async function fetchUser(username){
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    const body  =  await response.json();
    if(response.status  !== 200 )
        throw Error(body.message);
    return body;
}

async function show(username){
    try {
      const user  = await fetchUser(username);
      console.log(user.name);
      console.log(user.location);
    } catch (err) {
       console.error(`Error: ${err.message}`);
    }
}

show("OMENSAH1");
