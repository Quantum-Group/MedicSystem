<link rel='stylesheet' href='<?php echo asset("vendor/crudbooster/assets/select2/dist/css/select2.min.css")?>'/>
<style>
    .select2-container--default .select2-selection--single {border-radius: 0px !important}
    .select2-container .select2-selection--single {height: 35px}
</style>
<div  class='form-group header-group-0 ' >
    <label class='control-label col-sm-2'></label>

    <div class="col-sm-10">
        <div class="checkbox">
            <label><input ng-click="loadType()" ng-model="check_medico" type="checkbox" value="">Médico</label>
        </div>
        <div class="text-danger"></div>
        <p class='help-block'></p>
    </div>
</div>
<div ng-show="select" class='form-group header-group-0'>
    <label class='control-label col-sm-2'>Seleccione </label>

    <div class="col-sm-10">
        <select style="width: 100%"  class="select2" name="medico_id" id="tipo_id" ng-model="medico_id" ng-change="selected()">
            <option value="">Seleccione...</option>
            <option data-correo="[[i.correo]]" value="[[i.id]]" ng-repeat="i in item">[[i.nombre+' '+i.apellido]]</option>
        </select>
        <div class="text-danger"></div>
        <p class='help-block'></p>
        <div class="text-danger"></div>
        <p class='help-block'></p>
    </div>
</div>

<script src='<?php echo asset("vendor/crudbooster/assets/select2/dist/js/select2.full.min.js")?>'></script>
<script>
    $(".select2").select2();
    var app = angular.module('App',[],function($interpolateProvider){
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });
    app.controller('Ctrl',function($scope,$http){
        $scope.loadType=function(tipo){
            $scope.select = $scope.check_medico ? true:false; // muestra u oculta el select2

            var url = '{{CRUDBooster::adminPath($slug='todoMedico')}}';
            $http({
                method: 'GET',
                url: url,
                params:{medico_id:$scope.medico_id},
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function(data){
                console.log(data.data.medico);
                $scope.item = data.data.medico;
                $scope.$watch('item',function(){
                    $(".select2").select2();
                });
            });
        };
        $scope.loadType();
        $scope.selected=function(){
            $scope.name = $("#tipo_id option:selected").text();
            $scope.email = $("#tipo_id option:selected").attr("data-correo");
        };
        //cuando se envie el formulario
        $scope.submit = function(){
            var url = '{{CRUDBooster::adminPath($slug='medico/update')}}';
            $http({
                method: 'POST',
                url: url,
                data:{"medico_id":$scope.medico_id},
                headers: { 'Content-Type': 'application/json' }
            });
        };
    });
</script>