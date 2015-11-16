
//Data Functions
function makeTimeStamp(time) {
    var now = new Date();
    if (!time) {
        var time = new Date().getTime();
        log.debug(time);
    }
    else {
        var x = new Date(time);
        var d = x.getTime();
        log.debug(time, x, d);
    }
    if (d > now) {/*console.log('Future');*/
    }
    else {
        log.debug('Past');
    }
};
//Location Functions
function getUrlVars() {//get url variables
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        vars[key] = value;
    });
    return vars;
}
function hostInfo() {
    fullHost = window.location.pathname;
    log.debug(fullHost);
}
function redirecter(append, location) { //format and append necessary info to visit a url : reference, origin, session
    var newLink = location + append;
    window.location = newLink;
}
function maincontentlink() {
//    event.preventDefault();
    $('#main').focus();
}


function formatMoney(number) {
    return number.toFixed(0).replace(/./g, function (c, i, a) {
        return i > 0 && c !== "." && ((a.length - i) % 3 == 0) ? ',' + c : c;
    })
}

var DigitsToText = (function (intDigit) {
    var digits = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven',
        'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen', 'Twenty'];
    return digits[intDigit] || (intDigit + '');
});


function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
        return 'iOS';
    } else if (userAgent.match(/Android/i)) {
        return 'Android';
    } else {
        return 'unknown';
    }
}

function iOSMessage(inText) {
    if (getMobileOperatingSystem() == 'iOS') {
        console.log(inText);
    }
}

var iOSBelow8 = false;
if (navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i)) {
    if (Number(navigator.userAgent.substr(navigator.userAgent.indexOf('OS ') + 3, 3).replace('_', '.').charAt(0)) < 8) {
        iOSBelow8 = true;
    }
}

var iPhoneOSBelow8 = false;
if (navigator.userAgent.match(/iPhone/i)) {
    if (Number(navigator.userAgent.substr(navigator.userAgent.indexOf('OS ') + 3, 3).replace('_', '.').charAt(0)) < 8) {
        iPhoneOSBelow8 = true;
    }
}


/**
 * sortJSONArray sorts by property name and defaults to ascending order.
 * Examples:
 * sortJSONArray($scope.directDeposits, 'companyOwned',"dec");
 * sortJSONArray($scope.directDeposits, 'companyOwned',"asc");
 * sortJSONArray($scope.directDeposits, 'attribute.companyOwned',"asc");
 **/
var sortJSONArray = (function (objArray, prop, direction) {
    if (arguments.length < 2) alert("sortJSONArray requires 2 arguments");
    var direct = arguments.length > 2 ? arguments[2] : "asc"; //Default to ascending
    if (direct == "dec") {
        direct = -1;
    } else {
        direct = 1;
    }
    if (objArray && objArray.constructor === Array) {
        var propPath = (prop.constructor === Array) ? prop : prop.split(".");
        objArray.sort(function (a, b) {
            for (var p in propPath) {
                a = a[propPath[p]];
                b = b[propPath[p]];
            }
            // convert numeric strings to integers to sort numerically
            if ($.isNumeric(a) && $.isNumeric(b)) {
                a = +a;
                b = +b;
            }
            return ( (a < b) ? -1 * direct : ((a > b) ? 1 * direct : 0) );
        });
    }
});


//Directive pooling
var arrayOfIndexedTabs = [];
var indexStart = 30; //needs to correspond with 'tabIndexed' directive var x

//Browser specific
var agent = '';
function detectBrowser() {
    agent = navigator.userAgent || navigator.vendor || window.opera;
//    log.debug('User Agent registered as: '+agent);
    if (agent.match(/Chrome/i)) {
        return 'ch';
    } else if (agent.match(/Trident/i)) {
        return 'ie';
    } else if (agent.match(/Mozilla/i)) {
        return 'ff';
    } else {
        return agent;
    }
}


var expires = new Date() - 1;
var ayear = new Date();
var year = ayear.getTime();
year += 3600 * 1000 * 24 * 365;
ayear.setTime(year);
//cookie object - get, set and list
myCookies = {
    cookieName: '',
    value: '',
    expiration: '',
    setCookie: function (c_name, value, expires) {
        var exdate = new Date();
        exdate.setMinutes(exdate.getMinutes() + expires);
        var c_value = escape(value) + ((expires === null) ? "" : "; expires=" + exdate.toUTCString()) + ";domain=chase.com;path=/";
        log.info(c_value);
        document.cookie = c_name + "=" + c_value;
        log.info('Cookie Set: Name: ' + c_name + ' with the value of ' + value + ' and will expire in ' + expires + ' minutes');
    },
    getCookie: function (cookieName) {
        var arg = cookieName + "=";
        var alen = arg.length;
        var clen = document.cookie.length;
        var i = 0;
        while (i < clen) {
            var j = i + alen;
            if (document.cookie.substring(i, j) == arg) {
                return myCookies.getCookieVal(j);
            }
            i = document.cookie.indexOf(" ", i) + 1;
            if (i === 0) break;
        }
        return null;
    },
    getCookieVal: function (offset) {
        var endstr = document.cookie.indexOf(";", offset);
        if (endstr == -1) {
            endstr = document.cookie.length;
        }
        return unescape(document.cookie.substring(offset, endstr));
    },
    listCookies: function () {
        var theCookies = document.cookie.split(';');
        var aString = '';
        for (var i = 1; i <= theCookies.length; i++) {
            aString += i + ' ' + theCookies[i - 1] + "\n";
        }
        log.debug('Printing all cookies');
        log.debug(aString);
    }
};
/* end myCookie object */
/*
 //Highlight Current Position on Nav
 */
//jq(function() {
//    var url = (window.location.pathname.replace(/\/$/, "")); // Gets page name
//    jq('.topNav li a[href$="' + url + '"]').parent().addClass('highlight');
//});


var cookieArray = ['JESSIONID', 'audienceList', 'b2s-sessio-valid-until', 'fireOnce'];
var my_cache, my_history, my_cookies = '';
/* pulsate styling
 .hot{
 border:1px solid #f00 !important;
 }
 .activation-indicator{
 -webkit-animation: pulsate 1s ease-out;
 -webkit-animation-iteration-count: 3;
 }
 @-webkit-keyframes pulsate {
 0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
 50% {opacity: 1.0;}
 100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
 }


 .directive('tabIndexed', function ($window) {
 var x = 1;
 return {
 restrict: 'A',
 link: function (scope, element, attrs) {
 attrs.$set('tabindex', x);
 //                    attrs.$set('placeholder', x);
 var label = attrs.name;
 var name = '';
 if (typeof label != "undefined") {
 var name = label.length > 0 ? label : 'not found';
 }
 log.debug('Filed "' + name + '" has a tab index of ' + x);
 x++;
 }
 };
 })
 //Adds a place holder image when none is returned from the service
 .directive('defaultImage', function () {
 return {
 link: function (scope, element, attrs) {
 if (!attrs.ngSrc) {
 element.attr('src', '//placehold.it/' + attrs.defaultImage + '/1a8bcd/ffffff');
 log.warn("Image: a placeholder image has been applied")
 }
 } }
 }


 */
