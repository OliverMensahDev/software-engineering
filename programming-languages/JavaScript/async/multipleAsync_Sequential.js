const fetch =  require('node-fetch');
async function fetchFromGithub(endpoint){
    const url = `https://api.github.com${endpoint}`;
    const response = await fetch(url)
    return await response.json();
}
async function showUserAndRepo(handle){
    const user = await fetchFromGithub(`/users/${handle}`);
    const repos = await fetchFromGithub(`/users/${handle}/repos`);
    if(user.message=="Not Found"){
        throw Error(user.message);
    }else{
        var data = [user, repos];
        return data;
    }
}
showUserAndRepo("OMENSAH1")
   .then((data) => {
       console.log(data[0].name);
       console.log(data[1].length);
   })
    .catch((err) => {console.error(`Error:  ${err.message}` )})
