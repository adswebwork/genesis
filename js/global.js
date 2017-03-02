
if (typeof debug === 'undefined') {
    var debug = false;
    var log = { //Sets the logging functions to blank to avoid breaks
        trace: function () { },
        debug: function () { },
        info: function () { },
        error: function () { },
        fatal: function () { },
        warn: function () { }
    }
}

function updateBgImg(id, url) { //updates background image of a given id
    $('#' + id).css({"background": "url(" + url + ") no-repeat"});
    log.debug('Image: Banner updated based on location:' + url)
}
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
    log.debug('Host info is: '+ fullHost);
    return fullHost;
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


/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/) <-- Go here periodically to update regx below.
 * This regx has been modified to include tablet devices as well as mobile phones.
 * jQuery.browser.mobile will be true if the browser is a mobile phone or tablet
 **/
(function (a) {
    (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|android|ipad|playbook|silk|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
})(navigator.userAgent || navigator.vendor || window.opera);
var isTabletOrPhone = jQuery.browser.mobile;
//isTabletOrPhone=true;  // uncomment and set to true to view in desktop environment

/**
 * Returns the mobile operating system for iOS or Android devices
 */
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


function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
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
    } else if (agent.match(/Safari/i)) {
        return 'sa';
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

function limitCharacter(id){
        var ele = $('#'+id);
        var limit = ele.attr('maxlength');
        var text = ele.val();
        var chars = text.length;

        if(chars > limit){
            var new_text = text.substr(0, limit);
            ele.val(new_text);
        }
}


function setHeight(desireHeightID, allClass) {
    log.info('set height triggered');
    var height = $('#'+desireHeightID).height();
    var shortestHeight = 384 // 3 module;
    if (height > shortestHeight) {
        $('.' + allClass).css('height', height+32);
    } else {
        $('.' + allClass).css('height', shortestHeight);
    }
    log.info('Benchmark element: ' +desireHeightID);
    log.info('Benchmark element height: '+height);
    log.info('Class to propogate: '+allClass);

}
function setHeightVersion2(desireHeight, allClass) {
    log.info('set height triggered');
    var height = $('.'+desireHeight).height();
        $('.' + allClass).css('height', height);
    $('.travel-benefits button').css('position', 'absolute');
    log.debug(desireHeight);
    log.debug(height);
    log.debug(allClass);

}
var cookieArray = ['JESSIONID', 'audienceList', 'b2s-sessio-valid-until', 'fireOnce'];
var my_cache, my_history, my_cookies = '';
