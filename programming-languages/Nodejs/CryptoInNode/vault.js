const crypto = require("crypto");
const algorithm = "aes-256-cbc";
const password = "password1";
const salt = crypto.randomBytes(256).toString("hex");
const key = crypto.scryptSync(password,salt, 32);
const iv = crypto.randomBytes(16);
const cipher = crypto.createCipheriv(algorithm, key, iv);
let data = '111-0000-0000'
let encrypted = cipher.update(data, 'utf8','hex');
encrypted = cipher.final('hex')
console.log(encrypted);


//decipher 

const decipher = crypto.createDecipheriv(algorithm, key, iv);
let decrypted = decipher.update(encrypted, 'hex', 'utf8')
decrypted = decipher.final('utf8');
console.log(decrypted);

