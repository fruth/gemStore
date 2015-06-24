'use strict';

angular.module('myApp.store', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/store', {
    templateUrl: 'store/store.html',
    controller: 'StoreCtrl'
  });
}])

.controller('StoreCtrl', ['$scope', '$http', function($scope, $http) {

  $http.get('../api/index.php/items').success(function(response) {
    $scope.items = response.data.items;
  });

  $scope.name = 'Test';

}]);
