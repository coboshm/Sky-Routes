/**
 * Created by mcobos on 23/02/16.
 */
var myApp = angular.module('myApp', [ 'ui.bootstrap','ngSanitize', 'ngTouch', 'ngAnimate', 'rgkevin.datetimeRangePicker']);

myApp.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

var EVENTS = {
    COUNTRY_CHANGE: 'countryChange',
    ASK_COUNTRY: 'askCountry',
    FILTER_DATE_CHANGE_DEPARTURE: 'filterDateChangeDeparture',
    FILTER_DATE_CHANGE_RETURN: 'filterDateChangeReturn'
};

myApp.controller('generalCtrl', function($rootScope, $scope, $http, $uibModal) {

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

    $scope.country = $scope.countries[0];

    $scope.changeCountry = function(country) {
        $scope.country = country;
        $rootScope.$emit(EVENTS.COUNTRY_CHANGE, country);
    };

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

    $rootScope.$on(EVENTS.ASK_COUNTRY, function(event) {
        $rootScope.$emit(EVENTS.COUNTRY_CHANGE, $scope.country);
    });

});


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
