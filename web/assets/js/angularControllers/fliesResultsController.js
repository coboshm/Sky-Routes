myApp.controller('fliesResultsCtrl', function($rootScope, $scope, $http, $timeout) {

    $scope.route = [];
    $scope.search = [];
    $scope.index = null;
    $scope.LoadedFlights = false;
    $scope.limitShow = 10;
    $scope.invalitShow = 0;

    $scope.initRoute = function(route, index, search) {
        $scope.route = JSON.parse(route);
        $scope.search = JSON.parse(search);
        $scope.index = index;
        if (index < 10) {
            $scope.loadingFlights = true;
            $scope.loadFlight(0);
        }
    };

    $scope.loadFlight = function(val) {
        $scope.loadingFlights = true;
        $http({
            url: '/index.php/searchTickets',
            method: "POST",
            data: {
                'routes': $scope.route,
                'country': $scope.search.country,
                'lang': $scope.search.lang,
                'currency': $scope.search.currency,
                'departure': $scope.search.departure,
                'return': $scope.search.return
            }
        })
        .then(function (response) {
            if (val <= 2 && response.data.length <= 0) {
                $timeout(callAtTimeout(val), 5000);
            } else if (response.data.length <= 0) {
                $scope.loadingFlights = false;
                $scope.loadedFlights = false;
            } else {
                $scope.flights = response.data;
                $scope.loadingFlights = false;
                $scope.loadedFlights = true;
            }
        },function (response) {
            if (val < 2) {
                $timeout(callAtTimeout(val), 500);
            }
        });
    };

    function getLastIndexToShow() {
        var count = 0;

        for (index = 0; index < $scope.flights.length; ++index) {
            var minutes = $scope.flights[index].departureTimeDate.split(':')[1];
            var hour = $scope.flights[index].departureTimeDate.split(':')[0].split('T')[1];
            minutesDeparture = parseInt(hour, 10) * 60 + parseInt(minutes, 10);

            var minutes = $scope.flights[index].returnTimeDate.split(':')[1];
            var hour = $scope.flights[index].returnTimeDate.split(':')[0].split('T')[1];
            minutesReturn = parseInt(hour, 10) * 60 + parseInt(minutes, 10);

            if (minutesDeparture >= $scope.departureTimeFilter.from &&
                minutesDeparture <= $scope.departureTimeFilter.to &&
                minutesReturn >= $scope.returnTimeFilter.from &&
                minutesReturn <= $scope.returnTimeFilter.to) {

                count += 1;
                if (count >= $scope.limitShow) {
                    return index;
                }
            }
        }
        return $scope.limitShow;
    }

    $scope.showFlight = function(flight, index) {
        if (index > getLastIndexToShow()) {
            return false;
        }

        var minutes = flight.departureTimeDate.split(':')[1];
        var hour = flight.departureTimeDate.split(':')[0].split('T')[1];
        minutesDeparture = parseInt(hour, 10) * 60 + parseInt(minutes, 10);
        if (minutesDeparture < $scope.departureTimeFilter.from || minutesDeparture > $scope.departureTimeFilter.to) {
            return false;
        }

        var minutes = flight.returnTimeDate.split(':')[1];
        var hour = flight.returnTimeDate.split(':')[0].split('T')[1];
        minutesReturn = parseInt(hour, 10) * 60 + parseInt(minutes, 10);
        if (minutesReturn < $scope.returnTimeFilter.from || minutesReturn > $scope.returnTimeFilter.to) {
            return false;
        }

        return true;
    };

    function callAtTimeout(val) {
        $scope.loadFlight(val + 1);
    }

    $rootScope.$on(EVENTS.FILTER_DATE_CHANGE_RETURN, function(event, returnTime) {
        $scope.returnTimeFilter = returnTime;
    });

    $rootScope.$on(EVENTS.FILTER_DATE_CHANGE_DEPARTURE, function(event, departureTime) {
        $scope.departureTimeFilter = departureTime;
    });


});

myApp.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);
