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
            currency: 'EUR',
            lang: 'es-ES'
        },{
            name: 'FR',
            currency: 'EUR',
            lang: 'fr-FR'
        },{
            name: 'UK',
            currency: 'GBP',
            lang: 'en-GB'
        },{
            name: 'IT',
            currency: 'EUR',
            lang: 'it-IT'
        }, {
            name: 'GE',
            currency: 'EUR',
            lang: 'ge-GE'
        }
    ];

    $scope.passengers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $scope.IsdepartureOpen = false;
    $scope.IsreturnOpen = false;

    $scope.cityFrom = undefined;
    $scope.people = 1;
    $scope.country = $scope.countries[0];
    $scope.old_val = '';


    $scope.getLocation = function(val) {
        if (val != $scope.old_val && val.length > 2) {
            return $http({
                url: 'index.php/searchCountry',
                method: "POST",
                data: {
                    'query': val,
                    'country': $scope.country.name,
                    'currency': $scope.country.currency,
                    'lang': $scope.country.lang
                }
            })
            .then(function (response) {
                airports = JSON.parse(response.data);
                $scope.old_val = val;
                list = airports.Places.map(function (item) {
                    if (item.CityId != '-sky') {
                        return {
                            name: item.PlaceName + ' (' + item.CountryId.replace('-sky', '') + ')',
                            placeId: item.CityId
                        };
                    }
                });
                list = list.filter(function(n){ return n != undefined });
                return list;
            });
        }
    };

    $scope.submitSearchFlies = function() {
        $scope.cityFrom = $scope.cityFrom.placeId;
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
