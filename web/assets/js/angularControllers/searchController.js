/**
 * Created by mcobos on 23/02/16.
 */
angular.module('ui.bootstrap.demo', ['ngAnimate', 'ui.bootstrap'])
    .config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }]);

angular.module('ui.bootstrap.demo').controller('searchCtrl', function($scope, $http) {

    $http.get('assets/airports.json').success(function(data) {
         $scope.airports = data;
    });

    $scope.cityFrom = undefined;

    $scope.departureOpen = function() {
        $scope.departure.opened = true;
    };

    $scope.returnOpen = function() {
        $scope.return.opened = true;
    };

    $scope.departure = {
        opened: false
    };

    $scope.departure = {
        opened: false
    };

    $scope.today = function() {
        $scope.departure = new Date();
        $scope.return = new Date();
    };
    $scope.today();

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };


});
