//apart from the function declaration the rest works with IIFE
//class
const fetch =  require('node-fetch');
class GithubClient{
    async fetchUser(username){
        const url = `https://api.github.com/users/${username}`;
        const response = await fetch(url);
        return  await response.json();
    }
}

//expression
const  fetchUser = async function(username) {
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    return  await response.json();
}

//arrow functions
const  fetchUser1 = async (username)  =>{
    const url = `https://api.github.com/users/${username}`;
    const response = await fetch(url);
    return  await response.json();
}

(async ()=>{
    const client = new GithubClient();
    const user = await client.fetchUser('OMENSAH');
    console.log(user.name);
    console.log(user.location);
})();

(async ()=>{
    const use1 = await fetchUser('OMENSAH');
    console.log(user1.name);
    console.log(user1.location);
})();
(async ()=>{
    const user2 = await fetchUser1('OMENSAH');
    console.log(user2.name);
    console.log(user2.location);
})();
