'use strict';

angular.module('myApp.item', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/item', {
    templateUrl: 'item/item.html',
    controller: 'ItemCtrl'
  });
}])

.controller('ItemCtrl', ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {

  $scope.slug = $routeParams.itemSlug;

  console.log($scope.slug);

  $http.get('../api/index.php/item/' + $scope.slug).success(function(response) {
    console.log(response.data.item);
    $scope.item = response.data.item;
  });

}]);
