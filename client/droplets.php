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
        <div ng-repeat="d in droplets" class="droplet-item {{ d.status}}">
          <a class="infos" href="#">
            <p class="details">
              <strong class="name">{{ d.name }}</strong>
              <span class="id">#{{ d.id }}</span>
            </p>
            <p class="config">
              <span>{{ d.memory }} MB</span> /
              <span>{{ d.vcpus }} vCPUs</span> /
              <span>{{ d.disk }} GB SSD</span> -
              <i>{{ d.image.distribution }} {{ d.image.name }}</i>
            </p>
          </a>
          <div class="network">
            <strong>{{ d.region.slug }}</strong>
            <a href="http://{{ d.networks.v4[0].ip_address }}">{{ d.networks.v4[0].ip_address }}</a>
          </div>
        </div>
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
