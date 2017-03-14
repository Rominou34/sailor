<!doctype html>
<html ng-app="sailor" ng-controller="getDroplets">
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
      <h1 class="text-center">Droplets</h1>
      <div>
        <a ng-repeat="d in droplets" class="droplet-item {{ d.status}}">
          <p>
            <span class="name">{{ d.name }}</span>
            <span class="id">#{{ d.id }}</span>
          </p>
          <p>
            <span>{{ d.memory }} MB</span>
            <span>{{ d.vcpus }} vCore(s)</span>
            <span>{{ d.disk }} GB SSD</span>
          </p>
        </a>
      </div>
    </main>

    <script>
      var app = angular.module('sailor', []);
      app.controller('getDroplets', function($scope, $http) {
          $http.get("server/droplets.php")
          .then(function (response) {$scope.droplets = response.data.droplets;});
      });
    </script>
  </body>
</html>
