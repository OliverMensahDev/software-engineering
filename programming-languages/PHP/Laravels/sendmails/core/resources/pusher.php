<?php
namespace core\resources;

class Pusher
{
    public static function push($data, $channel, $event, $config = ['region' => 'eu', 'app_id' => '754580', 'app_key' => 'c13d2d5c7a53b6b375d5', 'app_secret' => 'b4f92ff8faf8e65d5654'])
    {
        $region = $config['region'];
        $app_id = $config['app_id'];
        $app_key = $config['app_key'];
        $app_secret = $config['app_secret'];
        $postData = json_encode(['data' => (string) json_encode($data), 'name' => $event, 'channel' => $channel]);
        $md5_string = md5($postData);
        $timestamp = strtotime('now +5 minutes');
        $auth_signature = hash_hmac('sha256', "POST\n/apps/$app_id/events\nauth_key=$app_key&auth_timestamp=$timestamp&auth_version=1.0&body_md5=$md5_string", $app_secret);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api-$region.pusher.com/apps/$app_id/events?body_md5=$md5_string&auth_version=1.0&auth_key=$app_key&auth_timestamp=$timestamp&auth_signature=$auth_signature&",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
