 var todoApp = angular.module('stater', ['ngRoute', 'firebase'], function($interpolateProvider) {
         $interpolateProvider.startSymbol('[[');
         $interpolateProvider.endSymbol(']]');
     });

 todoApp.controller('AppController', function($scope, $firebaseArray) {

     var messages = new Firebase("https://boiling-fire-7865.firebaseio.com/messages/");
     $scope.messages = $firebaseArray(messages);
     var newsFeeds = new Firebase("https://boiling-fire-7865.firebaseio.com/newsFeeds/");
     $scope.newsFeeds = $firebaseArray(newsFeeds);
     var vehicles = new Firebase("https://boiling-fire-7865.firebaseio.com/trainSystem/vehicles");
     $scope.vehicles = $firebaseArray(vehicles);
     // this waits for the data to load and then logs the output. Therefore,
     // data from the server will now appear in the logged output. Use this with care!
     $scope.messages.$loaded()
         .then(function() {
             //console.log($scope.messages);
             $rootScope.countMessage = $scope.messages.length;
         })
         .catch(function(err) {
             console.error(err);
         });
     $scope.newsFeeds.$loaded()
         .then(function() {
             //console.log($scope.newsFeeds);
             $rootScope.countNewsFeeds = $scope.newsFeeds.length;
         })
         .catch(function(err) {
             console.error(err);
         });
     $scope.vehicles.$loaded()
         .then(function() {
             //console.log($scope.vehicles);
             $rootScope.countvehicles = $scope.vehicles.length;
         })
         .catch(function(err) {
             console.error(err);
         });

 })
