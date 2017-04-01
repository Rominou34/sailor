<?php

  session_start();

  $do_login = 0;

  if(isset($_SESSION["do_access_token"])) {
    $do_login = 1;
  }

  echo('{ "do_login": '.$do_login.' }');
?>
