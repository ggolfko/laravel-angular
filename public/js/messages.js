 var todoApp = angular.module('stater', ['ngRoute', 'firebase'], function($interpolateProvider) {
         $interpolateProvider.startSymbol('[[');
         $interpolateProvider.endSymbol(']]');
     })
     .value('fbURL', 'https://boiling-fire-7865.firebaseio.com/messages');

 todoApp.factory('Projects', function($firebase, fbURL) {
     return $firebase(new Firebase(fbURL)).$asArray();
 })

 todoApp.config(function($routeProvider) {
     $routeProvider
         .when('/', {
             controller: 'ListCtrl',
             templateUrl: 'templates/messages/list.html'
         })
         .otherwise({
             redirectTo: '/'
         });
 })

 todoApp.controller('ListCtrl', function($scope, $location, $timeout, $anchorScroll, $routeParams, Projects) {
     $scope.messages = Projects;

     $scope.userGuest = Math.round(Math.random() * 100);
     $scope.checkNum = $scope.userGuest;
     // datetime
     var d = new Date();
     //d = d.toLocaleTimeString().replace(/:\d+ /, ' '); //00:00 AM/PM
     d = d.toLocaleTimeString() //00:00:00 AM/PM
         //
     $scope.addListItem = function() {
         $scope.messages.$add({
             'nameUser': 'ADMIN: GGOLFKO',
             'level': 'admin',
             'pic': 'http://img.whenintime.com/tli/gaboritk/Projet_BD_Fallout/4e67fb1b-be54-44e7-856b-da18878b2a93/Cowboy_Colored.png',
             'name': this.customQuote,
             'date': d
         });
         this.customQuote = null;
     };
 })
