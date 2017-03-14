<!doctype html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://rominou34.github.io/papillon/src/min/papillon.min.css">
    <script src="http://rominou34.github.io/papillon/src/js/papillon.js"></script>
    <script src="http://rominou34.github.io/papillon/src/js/dom.js"></script>
    <script src="http://rominou34.github.io/papillon/src/js/misc.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
  </head>
  <body class="navside">
    <?php
      include('components/header.php');
      include('components/nav.php');
    ?>
    <main>
      <h1 class="text-center">Welcome to Sailor !</h1>
      <div class="container">
        <h3>What is this ?</h3>
        <p>
          Sailor is a PWA used to monitor and manage your Digital Ocean
          account and droplets.<br/>
          It runs using only PHP for the back-end, and creates the front-end using
          AngularJS ( not Angular 2 ).<br/>
          It's still in very early development so it doesn't do much for now
        </p>
      </div>
      <div class="container">
        <h3>What's the point ?</h3>
        <p>
          I don't develop this webapp in order to gain fame or anything like that,
          I'm just doing it in order to learn new things.<br/>
          In fact, I'm going to use AngularJS to create the front-end of a webapp
          running on PHP during my internship, so the development of Sailor is
          going to help me a lot, and that's the main reason behind it.
        </p>
      </div>
    </main>
  </body>
</html>
