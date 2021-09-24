<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/16/2021
 * Time: 3:11 PM
 */
namespace Camdigikey\Service;


use Camdigikey\Service\JWT\JWT;

class Token
{

    private $config;

    public function __construct()
    {
        $this->config = new Config();
    }


    public function jwtToken()
    {
        date_default_timezone_set("Asia/Phnom_Penh");
        session_start();
        $clientId = $this->config->getClientId();

        $date = date('Y-m-d H:i:s', strtotime('+2 hour'));
        $expired = date(DATE_ISO8601, strtotime($date));
        $expired = explode("+", $expired)[0]."+07:00";
        $jwtPayload    = [
            "clientSessionId" => session_id(),
            "clientId" => $clientId,
            "expiredAt" => $expired
        ];
        $secretKey = $this->config->getSecretKey();
        $jwt = JWT::encode($jwtPayload, base64_decode($secretKey));

        return $jwt;
    }
}