<?php
include_once('credentials.php');

  function klarnaSession($amount = 0, $products = []){
                 $amount = $amount*100;
                 if(empty($amount)){
                     return false;
                 }
             
                 $post = [
                     "locale" => "en-GB",
                     "purchase_country" => "GB",
                     "purchase_currency" => "GBP",
                     "order_amount" => $amount,
                     "order_tax_amount" => 0,
                     "order_lines" => $products
                 ];
                 $api = KLARNA_URL."payments/v1/sessions";
                 $ch = curl_init();
                 curl_setopt($ch, CURLOPT_URL, $api);
                 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
                 curl_setopt($ch, CURLOPT_HTTPHEADER , array(
                     "Content-Type:application/json",
                     "Authorization: Basic ".base64_encode(KLARNA_CREDENTIALS)
                 ));
                 $response = curl_exec( $ch );
                 curl_close( $ch );
                 $response = json_decode($response , true);
                 if(!empty($response['session_id'])){
                     return $response['client_token'];
                 }
                 return false;
             }


 function getAuthorizationToken($token = ''){
    $data = [];
    $data['response'] = false;

    if(!$this->input->is_ajax_request()){
        exit('No direct script access allowed');
    }

    $amount = $_SESSION['klarnaAmount'];
    $productsJson = $_SESSION['klarnaProducts'];
    $products = json_decode($productsJson, true);
    $post = [
        "locale" => "en-GB",
        "purchase_country" => "GB",
        "purchase_currency" => "GBP",
        "order_amount" => $amount,
        "order_tax_amount" => 0,
        "order_lines" => $products,
        "merchant_urls" => [
            "confirmation" => "https://uflow.co.uk/klarna/webhooks_url",
        ]
    ];
    $api = KLARNA_URL."payments/v1/authorizations/".$token."/order";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPHEADER , array(
        "Content-Type:application/json",
        "Authorization: Basic ".base64_encode(KLARNA_CREDENTIALS)
    ));
    $response = curl_exec( $ch );
    curl_close( $ch );
    $response = json_decode($response , true);
    $data['klarnaResponse'] = $response;
    if(!empty($response['order_id'])){
        $_SESSION['order_id'] = $response['order_id'];
        $data['response'] = true;
    }
    echo json_encode($data);
}



























