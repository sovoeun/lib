<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/24/2021
 * Time: 4:02 PM
 */

namespace Camdigikey\service;


class Config
{
    private $config;
    public function __construct()
    {
        $this->config = (require dirname(__FILE__).'/../config/camdigikey.php');
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->config["client_id"];
    }

    /**
     * @return mixed
     */
    public function getSecretKey()
    {
        return $this->config["client_secret_key"];
    }


    /**
     * @return mixed
     */
    public function getOauthLoginUrl()
    {
        return $this->config["oauth_login_url"];
    }

    /**
     * @return mixed
     */
    public function getOauthLoginExchangeUrl()
    {
        return $this->config["oauth_login_authorize"];
    }


}