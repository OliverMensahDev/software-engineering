const crypto = require('crypto');
const hash = crypto.createHash('md5');
hash.update('password1');
console.log(hash.digest('hex'));


const shaHash = crypto.createHash('sha256');
shaHash.update('password1');
console.log(shaHash.digest('hex'));
