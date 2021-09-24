<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/16/2021
 * Time: 9:59 PM
 */

namespace Camdigikey\Service;


class Curl
{
    public function curl($url, $data = [])
    {
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_POST, 1);
         // Set the url path we want to call
         curl_setopt($curl, CURLOPT_URL, $url);
         // Make it so the data coming back is put into a string
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         // Insert the data
         curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
             'Content-Type: application/json'
         ));
         // You can also bunch the above commands into an array if you choose using: curl_setopt_array

         // Send the request
         $result = curl_exec($curl);

         // Get some cURL session information back
         $info = curl_getinfo($curl);

         curl_close($curl);

         return [
             "info"  => $info,
             "result" => $result
         ];
    }
}