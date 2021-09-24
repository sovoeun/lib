<?php
/**
 * Created by PhpStorm.
 * Author: SVN
 * Date: 9/16/2021
 * Time: 9:34 PM
 */

namespace Camdigikey\Service;


use Camdigikey\Model\CamdigikeyAuthorization;

class Exchange
{
    private $config;
    private $curl;
    private $camdigikeyAuthorizationModel;
    public function __construct()
    {
        $this->curl = new Curl();
        $this->config = new Config();
        $this->camdigikeyAuthorizationModel = new CamdigikeyAuthorization();
    }

    private function aesGcmEncrypt($data, $key)
    {
        $key = base64_decode($key);
        $iv = $this->getIV();

        return base64_encode(openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
    }

    public function exchange($token)
    {
        $data =[
            "authorize_token" => $this->aesGcmEncrypt($token, $this->config->getSecretKey()),
            "client_id" => $this->config["client_id"]
        ];

        $response = $this->curl->curl($this->config->getOauthLoginExchangeUrl(), $data);

        if($response["info"]["http_code"] != 200 ){
            die("error authorization");
        }


        $response = json_decode($response["result"], true);
        if($response == null){
            die("invalid data response");
        }

        // prepare data
        $data = [
            "request_token" => $token,
            "access_token" => $response["access_token"],
            "user_info" => json_encode(isset($response["user_info"])? $response["user_info"] : []),
            "full_response" => json_encode($response)
        ];

        $result = $this->camdigikeyAuthorizationModel->create($data);

        return $result;
    }


    private function getIV()
    {
        return base64_decode('w+tMd+qeUV6tVJMU89EulA==');
    }

}