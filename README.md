##Add package to composer.json
    camdigikey/library: v1.0.0

    composer required camdigikey/library: v1.0.0

##Add Variable to .env
    CAMDIGIKEY_CLIENT_ID=a9c5ca34-8596-4cc6-a2ed-ae3c992e4fe5
    CAMDIGIKEY_CLIENT_SECRET=z2pRQdZ9mLLNRNG3vNVEvDaUpyiIUI5+q7Ci1wJjmK0=
    CAMDIGIKEY_OAUTH_LOGIN_URL=http://13.228.49.20:8994/login
    CAMDIGIKEY_OAUTH_LOGIN_EXCHANGE=http://13.228.49.20:8994/exchange
    
## Add provider to config/app.php
     'providers' => [
        App\Providers\CamdigikeyServiceProvider::class
     ],
     'aliases' => [
        'Camdigikey' =>  \App\Camdigikey::class,
     ]
     
## autoload composer and publish vendor 
    composer dump-autoload
    php artisan vendor:publish
    
##For Testing in locally Add config below to composer.json
    "repositories": {
        "camdigikey": {
            "type" : "path",
            "url": "D:\\Development\\Wamp\\www\\camdigikeyphpclientlib",
            "options": {
                "symlink" : true
            }
        }
    },
   
## Sample Code
    Route::get('/login', function (\Camdigikey\Camdigikey $camdigikey) {
        return \Redirect::to($camdigikey->getLoginUrl());
    });

    Route::get('/success', function (\Camdigikey\Camdigikey $camdigikey) {
        $token =  request("token", "");
    
        if(!empty($token)){
            $camdigikey->success($token);
        }
    });
    
    Route::get('/failure', function (\Camdigikey\Camdigikey $camdigikey) {
        $token =  request("token", "");
    
        if(!empty($token)){
            $camdigikey->failure($token);
        }
    });