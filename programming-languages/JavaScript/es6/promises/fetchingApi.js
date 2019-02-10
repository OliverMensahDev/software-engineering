'use strict'

fetch("https://jsonplaceholder.typicode.com/todos")
.then((res)=>{
	if (res.status !== 200) {  
        console.log(`Looks like there was a problem. Status Code ${res.status}`);  
        return;  
    }
    res.json().then((data)=>{
    	console.log(data);
    });
})
.catch((err)=>{
	console.log(err);
})
