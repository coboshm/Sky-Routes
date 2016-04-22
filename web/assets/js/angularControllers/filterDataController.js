/**
 * Created by mcobos on 23/02/16.
 */
myApp.controller('filterDataCtrl', function($rootScope, $scope) {

    $scope.timeRangePickerDeparture = {
        time: {
            from: 0, // default low value
            to: 1440, // default high value
            step: 15, // step width
            minRange: 15, // min range
            hours24: false // true for 24hrs based time | false for PM and AM
        },
        "hasDatePickers": false,
        "hasTimeSliders": true
    };

    $scope.timeRangePickerReturn = {
        time: {
            from: 0, // default low value
            to: 1440, // default high value
            step: 15, // step width
            minRange: 15, // min range
            hours24: false // true for 24hrs based time | false for PM and AM
        },
        "hasDatePickers": false,
        "hasTimeSliders": true
    };

    $scope.$watch('timeRangePickerDeparture.time', function() {
        $rootScope.$emit(EVENTS.FILTER_DATE_CHANGE_DEPARTURE, $scope.timeRangePickerDeparture.time);
    }, true);

    $scope.$watch('timeRangePickerReturn.time', function() {
        $rootScope.$emit(EVENTS.FILTER_DATE_CHANGE_RETURN, $scope.timeRangePickerReturn.time);
    }, true);


});
