agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout,$q) {
    /*
     * Inicializacion
     */
     $scope.init = function () {
        $scope.slider = {
          value: 150,
          options: {
            floor: 0,
            ceil: 450
        }
    };
    $scope.init();
}; // fin init
});// fin controller
