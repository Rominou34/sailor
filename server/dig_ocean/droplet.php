<?php

/*
* Fake data because I can't query DO servers when I'm on LAN
* Comment this when on production
*
require('../data.php');
echo($droplet_by_id);
die();
*/

session_start();

if(isset($_SESSION["do_access_token"])) {
  if(isset($_POST["id"]) && !empty($_POST["id"])) {
    try {
      $ch = curl_init();

      if (FALSE === $ch)
          throw new Exception('failed to initialize');

      $token_url = "https://api.digitalocean.com/v2/droplets/".$_POST["id"];
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
  } else {
    echo("You did not specify an ID for the droplet");
  }
} else {
  echo('You are not logged in');
}
?>
