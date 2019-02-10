const fetch =  require('node-fetch');
async function fetchFromGithub(endpoint){
    const url = `https://api.github.com${endpoint}`;
    const response = await fetch(url)
    return await response.json();
}
async function showUserAndRepo(handle){
    const userPromise = await fetchFromGithub(`/users/${handle}`);
    const reposPromise = await fetchFromGithub(`/users/${handle}/repos`);
    if(userPromise.message=="Not Found"){
        throw Error(user.message);
    }else{
        const user = await userPromise;
        const repos = await reposPromise;
        var data = [user, repos];
        return data;
    }
}

showUserAndRepo("OMENSAH")
   .then((data) => {
       console.log(data[0].name);
       console.log(data[1].length);
   })
    .catch((err) => {console.error(`Error:  ${err.message}` )})
