<?php

class Bot{

    const API_URL = 'https://api.telegram.org/bot';
    private $token = '7332373576:AAH7nrAUXrFY7uf-Z0cQ5YiqZ-3fuCM_z2s';  //Bu mani telegram botimni tokeni
    public function makeRequest($method, $data = []){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL . $this->token . '/' . $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        var_dump($response);
    }
}