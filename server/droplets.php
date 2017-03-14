<?php

require('data.php');

// Fake data so I don't have to request DO servers everytime
//echo($droplets);

session_start();

if(isset($_SESSION["access_token"])) {
  try {
    $ch = curl_init();

    if (FALSE === $ch)
        throw new Exception('failed to initialize');

    $token_url = "https://api.digitalocean.com/v2/droplets";
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$_SESSION["access_token"]
        ));

    $content = curl_exec($ch);

    if (FALSE === $content)
        throw new Exception(curl_error($ch), curl_errno($ch));

    echo($content);
  } catch(Exception $e) {
    echo($e->getCode()."<br/>". $e->getMessage());
  }
}
?>
