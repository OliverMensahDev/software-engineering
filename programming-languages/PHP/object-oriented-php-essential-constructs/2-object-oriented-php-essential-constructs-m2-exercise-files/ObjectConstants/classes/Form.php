<?php

class Form{


    public function logger($data){
        file_put_contents(BASE_PATH . '/log/log.txt', $data, FILE_APPEND);
    }

    public function loadHtml(){
        return require BASE_PATH .'/html/contents.php';
    }
}


