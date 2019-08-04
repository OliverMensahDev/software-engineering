const express = require('express');
const app = express();
const speakeasy = require('speakeasy');
const qrcode = require('qrcode');
const bodyParser = require('body-parser');

app.use(bodyParser.urlencoded( { extended: true } ));

var router = express.Router();

var user = {
    two_factor_temp_secret: null,
    two_factor_secret: null,
    two_factor_enabled: false
};

router.get('/2fa', function(req, res){
    // generate a secret for the user
    var secret = speakeasy.generateSecret();

    user.two_factor_temp_secret = secret.base32;

    qrcode.toDataURL(secret.otpauth_url, function(err, data_url){

        res.send('<img src="' + data_url + '">');
    });
});

router.get('/authenticate', function(req, res){

    res.send('<form action="/app/verify" method="post">Enter Token: <input type="text" name="token"><br><input type="submit" value="submit">');

});

router.post('/verify', function(req, res){
    var userToken = req.body.token; 

    var base32secret = user.two_factor_temp_secret;

    var verified = speakeasy.totp.verify({
        secret: base32secret,
        encoding: 'base32',
        token: userToken
    });

    if(verified){
        user.two_factor_secret = user.two_factor_temp_secret;
        user.two_factor_enabled = true;

        console.log('Successfully verified');

        res.send('<p>Your token has been verified!</p>');
    } else {
        console.log('verification failed');

        res.send('<p>verification failed</p>');
    }
});

app.use('/app', router);

app.listen(3000);
console.log('App is running on port 3000');