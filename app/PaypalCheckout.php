<?php

namespace App;
use Exception;

class PaypalCheckout
{
    private $paypalAuthAPI;
    private $paypalAPI;
    private $paypalClientID;
    private $paypalSecret;

    public function __construct()
    {
        $this->paypalAuthAPI = config('paypal.mode') === 'sandbox' ? 'https://api-m.sandbox.paypal.com/v1/oauth2/token' : 'https://api-m.paypal.com/v1/oauth2/token';
        $this->paypalAPI = config('paypal.mode') === 'sandbox' ? 'https://api-m.sandbox.paypal.com/v2/checkout' : 'https://api-m.paypal.com/v2/checkout';
        $this->paypalClientID = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id');
        $this->paypalSecret = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_secret') : config('paypal.live.client_secret');
    }

    public function generateAccessToken()
    {
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, $this->paypalAuthAPI);  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_POST, true);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_USERPWD, $this->paypalClientID.":".$this->paypalSecret);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");  
        $auth_response = json_decode(curl_exec($ch)); 
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        curl_close($ch);  
 
        if ($http_code != 200 && !empty($auth_response->error)) {  
            throw new Exception('Failed to generate Access Token: '.$auth_response->error.' >>> '.$auth_response->error_description);  
        } 
          
        if(!empty($auth_response)){ 
            return $auth_response->access_token;  
        }else{ 
            return false; 
        } 
    }

    public function createOrder($productInfo, $paymentSource)
    {
        $accessToken = $this->generateAccessToken(); 
        if(empty($accessToken)){ 
            return false;  
        }else{ 
            $postParams = array( 
                "intent" => "CAPTURE", 
                "purchase_units" => array( 
                    array( 
                         "description" => $productInfo['item_name'], 
                         "quantity" => $productInfo['quantity'],
                        "amount" => array( 
                            "currency_code" => $productInfo['currency'], 
                            "value" => $productInfo['price'] 
                        ) 
                    ) 
                ) 
            ); 
 
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $this->paypalAPI.'/orders/'); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '. $accessToken));  
            curl_setopt($ch, CURLOPT_POST, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));  
            $api_resp = curl_exec($ch); 
            $api_data = json_decode($api_resp, true); 
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
            curl_close($ch); 
 
            if ($http_code != 200 && $http_code != 201) {  
                throw new Exception('Failed to create Order ('.$http_code.'): '.$api_resp);  
            } 
 
            return !empty($api_data) && ($http_code == 200 || $http_code == 201)?$api_data:false; 
        } 
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->generateAccessToken(); 
        if(empty($accessToken)){ 
            return false;  
        }else{ 
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $this->paypalAPI.'/orders/'.$orderId.'/capture'); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '. $accessToken));  
            curl_setopt($ch, CURLOPT_POST, true); 
            $api_resp = curl_exec($ch); 
            $api_data = json_decode($api_resp, true); 
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
            curl_close($ch); 
 
            if ($http_code != 200 && $http_code != 201) {  
                throw new Exception('Failed to create Order ('.$http_code.'): '.$api_resp);  
            } 
 
            return !empty($api_data) && ($http_code == 200 || $http_code == 201)?$api_data:false; 
        } 
    }
}
