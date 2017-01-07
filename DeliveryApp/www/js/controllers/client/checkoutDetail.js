angular.module('starter.controllers')
    .controller('ClientCheckoutDetailCtrl',
        ['$scope','$state','$stateParams','$cart' ,function ($scope,$state,$stateParams,$cart) {

        $scope.product = $cart.getItem($stateParams.index);

        $scope.updateQtd = function () {
            $cart.updateQtd($stateParams.index,$scope.product.qtd);
            $state.go('client.checkout');
        };

        $scope.openListProducts = function () {
            $state.go('client.view_products')
        };
        $scope.returnPage = function () {
            $state.go('client.checkout')
        };
    }]);