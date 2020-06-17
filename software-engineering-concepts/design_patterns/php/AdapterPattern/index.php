<?php

// Adaptee/Service
class WhatsAppShare {

    // Special Request
    public function wappShare(String $string) {
        echo "Share data via WhatsApp: ' $string ' \n";
    }
}
// Adaptee/Service
class FacebookShare {

    // Special Request
    public function share(String $string) {
        echo "Share data via Facebook: ' $string ' \n";
    }
}

// Target/client
interface Share {

    // Request
    public function shareData();
}
// Adapter
class WhatsAppShareAdapter implements Share {

    private $whatsapp;
    private $data;

    public function __construct(WhatsAppShare $whatsapp, String $data) {
        $this->whatsapp = $whatsapp;
        $this->data = $data;
    }

    public function shareData() {
        $this->whatsapp->wappShare($this->data);
    }
}


class FacebookShareAdapter implements Share {

    private $facebookShare;
    private $data;

    public function __construct(FacebookShare $facebookShare, String $data) {
        $this->facebookShare = $facebookShare;
        $this->data = $data;
    }

    public function shareData() {
        $this->facebookShare->share($this->data);
    }
}


function clientCode(Share $share) {
    $share->shareData();
}

$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello Whatsapp");
clientCode($waShare);

$fs = new FacebookShare();
$fsA = new FacebookShareAdapter($fs, "Hello Facebook");
clientCode($fsA);