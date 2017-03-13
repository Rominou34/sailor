<?php
session_start();

if(isset($_GET['code'])) {
  $code = $_GET['code'];

  try {
      $ch = curl_init();

      if (FALSE === $ch)
          throw new Exception('failed to initialize');

      $token_url = "https://cloud.digitalocean.com/v1/oauth/token?grant_type=authorization_code&code=".$code."&client_id=".CLIENT_ID."&client_secret=".CLIENT_SECRET."&redirect_uri=".REDIRECT_URI;
      curl_setopt($ch, CURLOPT_URL, $token_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);

      $content = curl_exec($ch);
      $token_infos = json_decode($content);
      var_dump($token_infos);

      if (FALSE === $content)
          throw new Exception(curl_error($ch), curl_errno($ch));

      // ...process $content now
  } catch(Exception $e) {
      echo($e->getCode()."<br/>". $e->getMessage());
      // trigger_error(sprintf(
      //     'Curl failed with error #%d: %s',
      //     $e->getCode(), $e->getMessage()),
      //     E_USER_ERROR);

  }
}

?>
