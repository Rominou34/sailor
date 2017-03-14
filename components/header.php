<header class="container soft-col stack-sm no-margin">
  <div class="col-9 no-margin">Sailor</div>
  <div class="col-3 text-right no-margin" id="user-info">
    <?php
    if(isset($_SESSION["access_token"])) {
    // If the user is logged in we hos his accoutn name
    ?>

    <?php
      } else {
      // Else we display the login button
    ?>
      <a class="button success no-margin" href="https://cloud.digitalocean.com/v1/oauth/authorize?response_type=code&client_id=<?php echo(CLIENT_ID)?>&redirect_uri=https://sailor.rominou.moe/oauth">Log In</a>
    <?php } ?>
  </div>
</header>
