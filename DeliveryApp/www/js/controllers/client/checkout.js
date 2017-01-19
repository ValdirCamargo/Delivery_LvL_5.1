angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',
        ['$scope','$state','$cart','Order','$ionicLoading','$ionicPopup','Cupom','$cordovaBarcodeScanner','User',
            function ($scope,$state,$cart,Order,$ionicLoading,$ionicPopup,Cupom,$cordovaBarcodeScanner,User) {
            var cart = $cart.get();
            $scope.cupom = cart.cupom;
            $scope.items = cart.items;
            $scope.total = $cart.getTotalFinal();
            //$scope.showDelete= true;
            $scope.removeItem = function (i) {
                $cart.removeItem(i);
                $scope.items.splice(i,1);
                $scope.total = $cart.getTotalFinal();
            };
            $scope.openListProducts = function () {
                $state.go('client.view_products')
            };

            $scope.openProductDetail = function (i) {
                $state.go('client.checkout_item_detail',{index : i})
            }

            $scope.save = function () {
               var o = {items: angular.copy($scope.items)};

                if($scope.cupom.value){
                    if($scope.cupom.value > $scope.total){
                        $ionicPopup.alert({
                            title: "Erro",
                            template: 'O valor do cupom é maior que o valor do pedido! Adicione mais itens no pedido ou remova o cupom.'
                        });
                        return;
                    }
                    o.cupom_code = $scope.cupom.code;
                }

               angular.forEach(o.items, function (item) {
                   item.product_id = item.id;
               });
               $ionicLoading.show({
                   template : 'Salvando pedido...'
               });

               Order.save({id: null},o, function (data) {
                    $ionicLoading.hide();
                    $state.go('client.checkout_successful');
               }, function (responseError) {
                    $ionicLoading.hide();
                    $ionicPopup.alert({
                        title: 'Ocorreu um erro',
                        template: 'Reenvie o pedido novamente'
                    })
               });

            };

            $scope.readBarCode = function () {
                $cordovaBarcodeScanner
                    .scan()
                    .then(function(barcodeData) {
                        getValueCupon(barcodeData.text);
                    }, function(error) {
                        $ionicPopup.alert({
                            title: 'Ocorreu um erro',
                            template: 'Falha ao ler QrCode - Tente novamente'
                        })
                    });

            };

            $scope.removeCupom = function () {
                $cart.removeCupom();
                $scope.cupom = $cart.get().cupom;
                $scope.total = $cart.getTotalFinal();
            };
            function getValueCupon(code) {
                $ionicLoading.show({
                    template : 'Carregando...'
                });
                Cupom.get({code: code},function (data) {
                    $cart.setCupom(data.data.code,data.data.value);
                    $scope.cupom = $cart.get().cupom;
                    $scope.total = $cart.getTotalFinal()
                    $ionicLoading.hide();
                },function (responseError) {
                    $ionicLoading.hide();
                    $ionicPopup.alert({
                        title: 'Advertencia',
                        template: 'Cupom Invalido'
                    })
                });
            };
    }]);