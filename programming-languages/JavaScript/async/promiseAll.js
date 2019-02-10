const fetch = require('node-fetch');
async function fetchFromGithub(endpoint){
    const url = `https://api.github.com${endpoint}`;
    const response = await fetch(url);
    return await response.json();
}

async function showUserAndRepos(handle){
    const [user, repos] = await Promise.all([
        fetchFromGithub(`/users/${handle}`),
        fetchFromGithub(`/users/${handle}/repos`)
    ])
     if(user.message=="Not Found"){
        console.error(user.message);
     }else{
         console.log(user.name);
         console.log(user.location);
         console.log(repos.length);
     }
}
showUserAndRepos("OMENSAH");
