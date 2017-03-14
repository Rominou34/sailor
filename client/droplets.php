<!doctype html>
<html ng-app="sailor" ng-controller="getDroplets">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
  </head>
  <body>
    <table>
      <tr ng-repeat="d in droplets">
        <td>{{ d.id }}</td>
        <td>{{ d.name }}</td>
        <td>{{ d.memory }} MB</td>
        <td>{{ d.vcpus }} vCore(s)</td>
        <td>{{ d.disk }} GB SSD</td>
      </tr>
    </table>

    <script>
      var app = angular.module('sailor', []);
      app.controller('getDroplets', function($scope, $http) {
          $http.get("server/droplets.php")
          .then(function (response) {$scope.droplets = response.data.droplets;});
      });
    </script>
  </body>
</html>
