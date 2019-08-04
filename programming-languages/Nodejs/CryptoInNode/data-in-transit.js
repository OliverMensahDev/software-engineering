const crypto = require("crypto");
const sally = crypto.createDiffieHellman(2048);
const sallyKeys = sally.generateKeys();
const bob = crypto.createDiffieHellman(sally.getPrime(), sally.getGenerator());
const bobKeys = bob.generateKeys();

const sallySecret = sally.computeSecret(bobKeys);
const bobSecret = bob.computeSecret(sallyKeys);

//hmac 
const hmac =crypto.createHmac('sha256', 'secret');
hmac.update("Some data to hash");
console.log(hmac.digest("hex"));


