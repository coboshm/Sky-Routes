/**
 * Created by mcobos on 23/02/16.
 */
var myApp = angular.module('ui.bootstrap.demo', ['ngAnimate', 'ui.bootstrap']);

myApp.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

myApp.controller('searchCtrl', function($scope, $http, $uibModal) {


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

    /*$http.get('assets/airports.json').success(function(data) {
         $scope.airports = data;
    });*/

    $scope.getLocation = function(val) {
        query = 'http://partners.api.skyscanner.net/apiservices/autosuggest/v1.0/GB/GBP/en-GB?query=' + val + '&apiKey=we576790151656261625171748788772';
        return $http.get(query).then(function(response){
            console.log(response);
            return 'test';
            /*return response.data.results.map(function(item){
                return item.formatted_address;
            });*/
        });
    };

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

    $scope.animationsEnabled = true;

    function detectmob() {
        if( navigator.userAgent.match(/Android/i)
            || navigator.userAgent.match(/webOS/i)
            || navigator.userAgent.match(/iPhone/i)
            || navigator.userAgent.match(/BlackBerry/i)
            || navigator.userAgent.match(/Windows Phone/i)
        ){
            return true;
        }
        else {
            return false;
        }
    }

    $scope.openModal = function (size) {

        if (detectmob()) {
            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: 'myModalContent.html',
                controller: 'ModalInstanceCtrl',
                size: size,
                resolve: {
                    countries: function () {
                        return $scope.countries;
                    },
                    country: function () {
                        return $scope.country;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.country = selectedItem;
            }, function () {});
        }
    };

    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

});


Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};


myApp.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, countries, country) {

    $scope.countries = countries;
    $scope.country = country;

    $scope.ok = function () {
        $uibModalInstance.close($scope.country);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

    $scope.changeCountry = function(country) {
        $scope.country = country;
    };
});
