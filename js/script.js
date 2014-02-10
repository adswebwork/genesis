var genesis = angular.module('genesis',['ngRoute','ngAnimate']);

genesis.constant("URL", {
    local   : '/genesis/#/',
    prod    : 'http://google.com'
});

var loginURL = 'processors/login.php';
var websitesURL = 'processors/display.php';

genesis.config(function($routeProvider){
    $routeProvider.
        when('/',{templateUrl: 'section/login.html'}).
        when('/display',{templateUrl: 'section/display.html'}).
        otherwise({redirectTo: '/'})
});

function GenesisCtrl($scope, $http, $timeout, $location, $log){
    $scope.siteTitle = 'Genesis';

    $scope.passcode = {}


//    Authentication
    $scope.login = function(){
        var password = $scope.passcode;
        $http({url: loginURL, method: "POST", data: password}).
            success(function(data){
                if(data.succsss){
                    $location.path('/display');
                }
            }).error(function(data){
//                $scope.errorLabel = 'Error: ';
//                $scope.errorMessage = data.message;
                console.log(data)
            });
    }

    $scope.logout = function(e){
        e.preventDefault();
        $scope.message = 'Logining out';

    }



    $scope.displayData = function(){
        $http({url: websitesURL, method: "GET", data: ''}).
            success(function(data){
            $scope.websites = data.websites;
            $scope.wscount = data.sitecount;
            });
    }

    $scope.launchSite = function(site){
       window.open('/'+site);
    }






}//End of GenesisCtrl