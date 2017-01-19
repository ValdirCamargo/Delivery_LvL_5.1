angular.module('starter.controllers')
    .controller('ClientOrderCtrl',[
        '$scope','$state','$ionicLoading','Order',
        function ($scope,$state,$ionicLoading,Order)
        {
            $scope.items = [];

            $ionicLoading.show({
                template:'Carregando...'
            });

            $scope.doRefresh = function () {
                loadOrders();
                $scope.$broadcast('scroll.refreshComplete');
            };

            $scope.openOrderDetail = function (order) {
                $state.go('client.view_order',{id:order.id})
            }

            function loadOrders() {
                Order.query({
                    id: null,
                    orderBy:'created_at',
                    sortedBy:'desc'
                },function (data)
                {
                    $scope.items = data.data;
                    $ionicLoading.hide();
                },function (dataError){
                    $ionicLoading.hide();

                });
            };
            loadOrders();

    }]);