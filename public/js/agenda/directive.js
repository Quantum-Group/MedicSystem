agenda.directive('horaInicio', function () {
    return {
        restrict: 'E',
        require: 'ngModel',
        replace: true,
        link: function (scope, element, attrs) {
            scope.timings = ['7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am',
                '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am',
                '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am',
                '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '13:00 pm', '13:15 pm',
                '13:30 pm', '13:45 pm', '14:00 pm', '14:15 pm', '14:30 pm', '14:45 pm',
                '15:00 pm', '15:15 pm', '15:30 pm', '15:45 pm', '16:00 pm', '16:15 pm',
                '16:30 pm', '16:45 pm', '17:00 pm', '17:15 pm', '17:30 pm', '17:45 pm',
                '18:00 pm', '18:15 pm', '18:30 pm', '18:45 pm', '19:00 pm', '19:15 pm',
                '19:30 pm', '19:45 pm', '20:00 pm', '20:15 pm', '20:30 pm', '20:45 pm',
                '21:00 pm', '21:15 pm', '21:30 pm', '21:45 pm', '22:00 pm', '22:15 pm',
                '22:30 pm', '22:45 pm', '23:00 pm', '23:15 pm', '23:30 pm', '23:45pm',
                '00:00 am', '00:15 am', '00:30 am', '00:45 am', '1:00 am', '1:15 am',
                '1:30 am', '1:45 am', '2:00 am', '2:15 am', '2:30 am', '2:45 am',
                '3:00 am', '3:15 am', '3:30 am', '3:45 am', '4:00 am', '4:15 am',
                '4:30 am', '4:45 am', '5:00 am', '5:15 am', '5:30 am', '5:45 am',
                '6:00 am', '6:15 am', '6:30 am', '6:45 am'
            ];

        },
        template: '<select class="form-control" name="hora_inicio" id="horaInicio"><option value="[[time]]" ng-repeat="time in timings">[[time]]</option></select>'
    };
});
agenda.directive('horaFin', function () {
    return {
        restrict: 'E',
        require: 'ngModel',
        replace: true,
        link: function (scope, element, attrs) {
            scope.timings = ['7:00 am', '7:15 am', '7:30 am', '7:45 am', '8:00 am', '8:15 am',
                '8:30 am', '8:45 am', '9:00 am', '9:15 am', '9:30 am', '9:45 am',
                '10:00 am', '10:15 am', '10:30 am', '10:45 am', '11:00 am', '11:15 am', '11:30 am', '11:45 am',
                '12:00 pm', '12:15 pm', '12:30 pm', '12:45 pm', '13:00 pm', '13:15 pm',
                '13:30 pm', '13:45 pm', '14:00 pm', '14:15 pm', '14:30 pm', '14:45 pm',
                '15:00 pm', '15:15 pm', '15:30 pm', '15:45 pm', '16:00 pm', '16:15 pm',
                '16:30 pm', '16:45 pm', '17:00 pm', '17:15 pm', '17:30 pm', '17:45 pm',
                '18:00 pm', '18:15 pm', '18:30 pm', '18:45 pm', '19:00 pm', '19:15 pm',
                '19:30 pm', '19:45 pm', '20:00 pm', '20:15 pm', '20:30 pm', '20:45 pm',
                '21:00 pm', '21:15 pm', '21:30 pm', '21:45 pm', '22:00 pm', '22:15 pm',
                '22:30 pm', '22:45 pm', '23:00 pm', '23:15 pm', '23:30 pm', '23:45pm',
                '00:00 am', '00:15 am', '00:30 am', '00:45 am', '1:00 am', '1:15 am',
                '1:30 am', '1:45 am', '2:00 am', '2:15 am', '2:30 am', '2:45 am',
                '3:00 am', '3:15 am', '3:30 am', '3:45 am', '4:00 am', '4:15 am',
                '4:30 am', '4:45 am', '5:00 am', '5:15 am', '5:30 am', '5:45 am',
                '6:00 am', '6:15 am', '6:30 am', '6:45 am'
            ];

        },
        template: '<select class="form-control" name="hora_fin" id="horaFin"><option value="[[time]]" ng-repeat="time in timings">[[time]]</option></select>'
    };
});
