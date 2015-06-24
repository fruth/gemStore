'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'myApp.store',
  'myApp.item',
  'myApp.version'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/item/:itemSlug', {
    templateUrl: 'item/item.html',
    controller: 'ItemCtrl'
  })
  .when('/store', {
    templateUrl: 'store/store.html',
    controller: 'StoreCtrl'
  })
  .otherwise({redirectTo: '/store'});
}]);
