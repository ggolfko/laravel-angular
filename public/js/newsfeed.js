 var todoApp = angular.module('stater', ['ngRoute', 'firebase'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })
    .value('fbURL', 'https://boiling-fire-7865.firebaseio.com/newsFeeds');

todoApp.factory('Projects', function($firebase, fbURL) {
    return $firebase(new Firebase(fbURL)).$asArray();
})

todoApp.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            controller: 'ListCtrl',
            templateUrl: 'templates/newsfeed/newsfeed_list.html'
        })
        .when('/edit/:projectId', {
            controller: 'EditCtrl',
            templateUrl: 'templates/newsfeed/newsfeed_detail.html'
        })
        .when('/new', {
            controller: 'CreateCtrl',
            templateUrl: 'templates/newsfeed/newsfeed_detail.html'
        })
        .otherwise({
            redirectTo: '/'
        });
})

todoApp.controller('ListCtrl', function($scope, Projects) {
    $scope.projects = Projects;
})

todoApp.controller('CreateCtrl', function($scope, $location, $timeout, Projects) {
    $scope.save = function() {
        Projects.$add($scope.project).then(function(data) {
            $location.path('/');
        });
    };
})

todoApp.controller('MapCtrl', ['$scope', '$state', function($scope, $state) {
   
}])


todoApp.controller('EditCtrl',
    function($scope, $location, $routeParams, Projects) {
        var projectId = $routeParams.projectId,
            projectIndex;

        $scope.projects = Projects;
        projectIndex = $scope.projects.$indexFor(projectId);
        $scope.project = $scope.projects[projectIndex];

        $scope.destroy = function() {
            $scope.projects.$remove($scope.project).then(function(data) {
                $location.path('/');
            });
        };

        $scope.save = function() {
            $scope.projects.$save($scope.project).then(function(data) {
                $location.path('/');
            });
        };
    });