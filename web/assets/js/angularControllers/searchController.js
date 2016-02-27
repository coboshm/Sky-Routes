/**
 * Created by mcobos on 23/02/16.
 */
var myApp = angular.module('ui.bootstrap.demo', ['ngAnimate', 'ui.bootstrap']);

myApp.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

myApp.controller('searchCtrl', function($scope, $http) {


    $scope.countries = [
        {
            name: 'ES',
            currency: 'EUR'
        },{
            name: 'FR',
            currency: 'EUR'
        },{
            name: 'UK',
            currency: 'GBP'
        },{
            name: 'IT',
            currency: 'EUR'
        }, {
            name: 'GE',
            currency: 'EUR'
        }
    ];
    $scope.passengers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $scope.IsdepartureOpen = false;
    $scope.IsreturnOpen = false;

    $scope.citiFrom = undefined;
    $scope.people = 1;
    $scope.country = $scope.countries[0];

    $http.defaults.headers.common['Accept'] = 'application/json';
    $http.defaults.headers.common['Access-Control-Allow-Headers'] = true;
    $http.get('assets/airports.json').success(function(data) {
         $scope.airports = data;
    });

    $scope.departureOpen = function() {
        $scope.IsDepartureOpen = true;
    };

    $scope.returnOpen = function() {
        $scope.IsReturnOpen = true;
    };
    $scope.today = function() {
        $scope.departure = new Date();
        $scope.return = new Date();
        $scope.return.addDays(3);
    };
    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1,
        maxMode: 'day'
    };
    $scope.changeCountry = function(country) {
        $scope.country = country;
    };


    $scope.today();

});


Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};
