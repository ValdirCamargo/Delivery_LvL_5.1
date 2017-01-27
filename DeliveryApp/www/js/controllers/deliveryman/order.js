angular.module('starter.controllers')
    .controller('DeliverymanOrderCtrl',[
        '$scope','$state','$ionicLoading','DeliverymanOrder',
        function ($scope,$state,$ionicLoading,DeliverymanOrder)
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
                $state.go('deliveryman.view_order',{id:order.id})
            }

            function loadOrders() {
                DeliverymanOrder.query({
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