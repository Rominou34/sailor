<!doctype html>
<html ng-app="sailor" ng-controller="getDroplets">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
  </head>
  <body class="navside">
    <?php include('components/nav.php'); ?>
    <main>
      <div>
        <div ng-repeat="d in droplets" class="droplet-item">
          <p>
            <span class="name">{{ d.name }}</span>
            <span class="id">#{{ d.id }}</span>
          </p>
          <p>{{ d.memory }} MB</p>
          <p>{{ d.vcpus }} vCore(s)</p>
          <p>{{ d.disk }} GB SSD</p>
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
