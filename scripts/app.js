console.log(window.location.pathname);
var app = angular.module('sailor', ["ngRoute"]);

/*
* APP
*/
app
// Sessions controller
.controller('getSessions', function($scope, $http) {
    $http.get("/sailor/server/sessions.php")
    .then(function (response) {$scope.sessions = response.data;});
})
// Route controller
.controller('routeCtrl', function($scope, $location) {
  $scope.navigate = function(route) {
    $location.path(route);
  }
})
// Droplets list controller
.controller('dropletsListCtrl', function($scope, $http, $location) {
    $http.post("server/dig_ocean/droplets.php")
    .then(function(response) { $scope.droplets = response.data.droplets;});

    $scope.viewDroplet = function(droplet) {
      console.log(droplet);
      $location.path("/dig_ocean/droplets/"+droplet);
    }
})
// Droplet controller
.controller('dropletCtrl', function($scope, $http, $routeParams) {
    $http.post("server/dig_ocean/droplet.php", {"id": $routeParams.dropletId})
    .then(function(response) { console.log(response.data);$scope.droplet = response.data.droplet;});
})
// Route config
.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl: "client/homepage.html"
    })
    .when("/dig_ocean/droplets/", {
        templateUrl : "client/dig_ocean/dropletsList.html"
    })
    .when('/dig_ocean/droplets/:dropletId', {
        templateUrl : "client/dig_ocean/droplet.html"
    })
    .otherwise({
        templateUrl : "client/pages/404.html"
    });
});
