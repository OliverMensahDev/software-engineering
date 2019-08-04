const crypto = require('crypto');
const password = "password1"
const salt = crypto.randomBytes(256).toString('hex');
const hashPwd = crypto.pbkdf2Sync(password, salt, 100000, 512, 'sha512');
console.log(hashPwd.toString('hex'));

