agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout,$q) {
    /*
     * Inicializacion
     */
    // Constructor  -->
    var vm = this; // this == controller

    var Slider = function(){
        this.slider = {
            inicio:'',
            fin:'',
            minValue:7,
            maxValue:20,
            options: {
                floor: 7,
                ceil: 20,
                vertical:false,
                showTicksValues: true,
                disabled:true,
                draggableRange: true,
                minRange: 1,
                onChange: function(sliderId, modelValue, highValue, pointerType) {
                    switch(this.id){
                        case 1:
                            vm.lunSlider.inicio = modelValue;
                            vm.lunSlider.fin = highValue;
                        break;
                        case 2:
                            vm.marSlider.inicio = modelValue;
                            vm.marSlider.fin = highValue;
                        break;
                        case 3:
                            vm.mieSlider.inicio = modelValue;
                            vm.mieSlider.fin = highValue;
                        break;
                        case 4:
                            vm.jueSlider.inicio = modelValue;
                            vm.jueSlider.fin = highValue;
                        break;
                        case 5:
                            vm.vieSlider.inicio = modelValue;
                            vm.vieSlider.fin = highValue;
                        break;
                        case 6:
                            vm.sabSlider.inicio = modelValue;
                            vm.sabSlider.fin = highValue;
                        break;
                        case 7:
                            vm.domSlider.inicio = modelValue;
                            vm.domSlider.fin = highValue;
                        break;
                    }
                },
            }
        }
        return this.slider;
    };
    $scope.activar= function(dia){
        switch(dia){
            case "lunes":
            vm.lunSlider.options.disabled=false;
            break;
            case "martes":
            vm.marSlider.options.disabled=false;
            break;
            case "miercoles":
            vm.mieSlider.options.disabled=false;
            break; 
            case "jueves":
            vm.jueSlider.options.disabled=false;
            break;
            case "viernes":
            vm.vieSlider.options.disabled=false;
            break;
            break;case "sabado":
            vm.sabSlider.options.disabled=false;
            break;
            break;case "domingo":
            vm.domSlider.options.disabled=false;
            break;
        }
        $scope.$broadcast('rzSliderForceRender');
    };
    $scope.desactivar= function(dia){
        switch(dia){
           case "lunes":
           vm.lunSlider.options.disabled=true;
           break;
           case "martes":
           vm.marSlider.options.disabled=true;
           break;
           case "miercoles":
           vm.mieSlider.options.disabled=true;
           break; 
           case "jueves":
           vm.jueSlider.options.disabled=true;
           break;
           case "viernes":
           vm.vieSlider.options.disabled=true;
           break;
           break;case "sabado":
           vm.sabSlider.options.disabled=true;
           break;
           break;case "domingo":
           vm.domSlider.options.disabled=true;
           break;
       }
       $scope.$broadcast('rzSliderForceRender');
   };
   vm.lunSlider = new Slider();
   vm.lunSlider.options.id=1;
   vm.lunSlider.inicio=7;
   vm.lunSlider.fin=20;

   vm.marSlider = new Slider();
   vm.marSlider.options.id=2;
   vm.marSlider.inicio=7;
   vm.marSlider.fin=20;

   vm.mieSlider = new Slider();
   vm.mieSlider.options.id=3;
   vm.mieSlider.inicio=7;
   vm.mieSlider.fin=20;

   vm.jueSlider = new Slider();
   vm.jueSlider.options.id=4;
   vm.jueSlider.inicio=7;
   vm.jueSlider.fin=20;

   vm.vieSlider = new Slider();
   vm.vieSlider.options.id=5;
   vm.vieSlider.inicio=7;
   vm.vieSlider.fin=20;

   vm.sabSlider = new Slider();
   vm.sabSlider.options.id=6;
   vm.sabSlider.inicio=7;
   vm.sabSlider.fin=20;

   vm.domSlider = new Slider();
   vm.domSlider.options.id=7;
   vm.domSlider.inicio=7;
   vm.domSlider.fin=20;

});// fin controller