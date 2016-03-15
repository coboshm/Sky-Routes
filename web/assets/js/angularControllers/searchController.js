/**
 * Created by mcobos on 23/02/16.
 */
myApp.controller('searchCtrl', function($rootScope, $scope, $http) {

    $scope.cityFrom = undefined;
    $scope.old_val = '';
    $scope.animationsEnabled = true;
    $scope.country = [];
    $scope.departure = new Date();
    $scope.return = new Date();
    $scope.return.addDays(3);

    $scope.getLocation = function(val) {
        if (val != $scope.old_val && val.length > 2) {
            return $http({
                url: '/index.php/searchCountry',
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
        $scope.cityName = $scope.cityFrom.name;
        $scope.cityFrom = $scope.cityFrom.placeId;
    };

    $rootScope.$on(EVENTS.COUNTRY_CHANGE, function(event, country) {
        $scope.country = country;
    });


    $rootScope.$emit(EVENTS.ASK_COUNTRY);

});


Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};
