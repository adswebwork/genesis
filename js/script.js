var genesis = angular.module('genesis', ['ngRoute', 'ngAnimate']);

genesis.constant("URL", {
    local: '/genesis/#/',
    prod: 'http://google.com',
    background: 'processors/background.php'
});

var loginURL = 'processors/login.php';
var websitesURL = 'processors/display.php';
var background = 'processors/background.php';

genesis.config(function ($routeProvider) {
    $routeProvider.
        when('/', {templateUrl: 'section/display.html'}).
        when('/display', {templateUrl: 'section/display.html'}).
        otherwise({redirectTo: '/'})
});
function GenesisCtrl($scope, $http, $location) {
    $scope.siteTitle = 'Genesis';
    $scope.passcode = {}
//    Authentication
    $scope.login = function () {
        var password = $scope.passcode;
        $http({url: loginURL, method: "POST", data: password}).
            success(function (data) {
                if (data.succsss) {
                    $location.path('/display');
                }
            }).error(function (data) {
//                $scope.errorLabel = 'Error: ';
//                $scope.errorMessage = data.message;
                console.log(data)
            });
    }
    $scope.logout = function (e) {
        e.preventDefault();
        $scope.message = 'Logining out';

    }
    //$scope.goto = function(url){ $location.path = '/'+url; alert('ok');  }
    $scope.displayData = function () {
        $http({url: websitesURL, method: "GET", data: ''}).
            success(function (data) {
                $scope.websites = data.websites;
                $scope.wscount = data.sitecount;
            });
    }


    $scope.launchSite = function (site) {
        window.open('/' + site);
    }

    $scope.sitebackground = function () {
        log.info('Site background called');
        $http({url: background, method: "GET", data: ''}).
            success(function (data) {
                var url = data.url;
                log.debug('Site background returned as: ' + url)
                $('#body').css('background-image', 'url(images/'+url+')');
//                return data.url;
            });
        log.info('Site background returned as: ');
    }


}//End of GenesisCtrl