const http = require("http");

const req = http.request({
  hostname: 'www.google.com',
  method: 'GET'
}, (res) =>{
    // console.log(res);
    console.log(res.statusCode);
    console.log(res.headers);
    res.on('data', (data)=>{
      console.log(data.toString());
    })    
});

req.on('error', (e)=> console.log(e))
req.end();