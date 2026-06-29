<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function supabase_inserir_tentativa($dados){
    $url = getenv('SUPABASE_URL') . '/rest/v1/tentativas';
    $apiKey = getenv('SUPABASE_SERVICE_ROLE_KEY');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: '.$apiKey,
        'Authorization: Bearer '.$apiKey,
        'Content-Type: application/json',
        'Prefer: return=representation'
    ]);
    $resp = curl_exec($ch);
    curl_close($ch);
    return json_decode($resp, true);
}
