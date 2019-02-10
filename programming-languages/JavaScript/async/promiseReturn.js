const fetch =  require('node-fetch');
async  function getUser(username) {
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    return  await response.json();
}
getUser("OMENSAH")
  .then(function(data){
      console.log(data.name);
      console.log(data.location);
  })
