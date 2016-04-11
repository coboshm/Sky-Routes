myApp.controller('fliesResultsCtrl', function($rootScope, $scope, $http, $timeout) {

    $scope.route = [];
    $scope.search = [];
    $scope.index = null;
    $scope.LoadedFlights = false;
    $scope.limitShow = 4;

    $scope.initRoute = function(route, index, search) {
        $scope.route = JSON.parse(route);
        $scope.search = JSON.parse(search);
        $scope.index = index;
        if (index < 5) {
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

    function callAtTimeout(val) {
        $scope.loadFlight(val + 1);
    }

    function startTime() {
        console.log('hello');
    }

    function endTime() {
        console.log('end');
    }

});


myApp.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);
