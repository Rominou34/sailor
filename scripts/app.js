console.log(window.location.pathname);
var app = angular.module('sailor', ["ngRoute"]);
app
.controller('getSessions', function($scope, $http) {
    $http.get("/sailor/server/sessions.php")
    .then(function (response) {$scope.sessions = response.data;});
})
.controller('routeCtrl', function($scope, $location) {
  $scope.navigate = function(route) {
    $location.path(route);
  }
})
.controller('getDroplets', function($scope, $http) {
    $http.get("server/droplets.php")
    .then(function (response) {$scope.droplets = response.data.droplets;});
})
.config(function($routeProvider) {
    $routeProvider
    .when("/dig_ocean/droplets/", {
        templateUrl : "client/dig_ocean/droplets.html"
    })
    .when("/", {
      templateUrl: "client/homepage.html"
    })
    .otherwise({
        templateUrl : "client/pages/404.html"
    });
});
