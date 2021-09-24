<?php

namespace App;

use Camdigikey\service\Config;
use Camdigikey\Service\Exchange;
use Camdigikey\Service\Token;

class Camdigikey{

    private $config;

    private $signToken;

    private $authorization;

    public function __construct()
    {
        $this->config = new Config();
        $this->signToken = new Token();
        $this->authorization = new Exchange();
    }

    public function getLoginUrl()
    {
        $token = $this->signToken->jwtToken();
        $url = $this->config->getOauthLoginUrl()."?token=". $token;
        return $url;
    }

    public function success($token)
    {
        return $this->authorization->exchange($token);
    }


    public function failure($token)
    {

    }
}