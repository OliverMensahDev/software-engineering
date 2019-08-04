const dns = require('dns');
dns.lookup('ashesi.edu.gh', (err, address)=> {
  console.log(address);
})

dns.resolve4('ashesi.edu.gh', (err, address)=> {
  console.log(address);
})

dns.resolve('ashesi.edu.gh', 'MX', (err, address)=> {
  console.log(address);
})

dns.resolveMx('ashesi.edu.gh', (err, address)=> {
  console.log(address);
})

dns.reverse('199.83.129.1', (err, hostNames)=> {
  console.log(hostNames);
})
