//This files is used to facilitate rapid development by consolidating features and functions
//~ads

var debugMode = sessionStorage['debug'];


if (debugMode == 'true') {
    var log = log4javascript.getDefaultLogger();
    var debug = true;
    log.info('Debugger has been activated and is running!');
}
else {
    log = { //Sets the logging functions to blank to avoid breaks
        trace: function () {
        },
        debug: function () {
        },
        info: function () {
        },
        error: function () {
        },
        fatal: function () {
        },
        warn: function () {
        }
    };
    var debug = false;
}

//To deactivate all key code functionality - we simply comment out this line
/////////////////////////////////////////////////////////////////////
document.onkeydown = checkKeycode; //Adds a key listener
/////////////////////////////////////////////////////////////////////

//Debugger Variables
var mydebugger = '';
var debuggerCall = '';
var codeLabel = '';
var codeValue = '';
var codeText = '';

//Toggle debugger
var debugon = '696685717978'; //debugOn is 68,69,66,85,71,79,78
var debugoff = '69668571797070'; //debugOff is 68,69,66,85,71,79,70,70
var Reload = '696883'; // Type 'red' to trigger this command : code: 82696883


//Add new code
var newcode = '698767796869'; //

//Count css rules and styles
var styles = '8489766983'; //styles is 83, 84, 89, 76, 69, 83

// menu
var mymenu = '8977697885'; // Type 'mymenu' to trigger this command : code: 778977697885

// Optional - show automation
var showauto = '72798765858479'; //showauto '83, 72, 79, 87, 65 ,85 ,84 ,79';

//Location codes
var totop = '79847980'; // Type 'totop' to trigger this command : code: 8479847980
var tobase = '7966658369'; // Type 'tobase' to trigger this command : code: 847966658369
var gotoid = '7984797368'; // Type 'gotoid' to trigger this command : code: 717984797368


var scrollto = '67827976768479'; // Type 'scrollto' to trigger this command : code: 8367827976768479
//- to pages

//device opener
var openas = '8069786583'; // Type 'openas' to trigger this command : code: 798069786583

//debuggers
var showruler = '7279878285766982'; // Type 'showruler' to trigger this command : code: 837279878285766982
var codes = '79686983'; // Type 'codes' to trigger this command : code: 6779686983
var focus = '79678583'; // Type 'focus' to trigger this command : code: 7079678583

//geolocation
var showgeo = '727987716979'; // Type 'showgeo' to trigger this command : code: 83727987716979
var changegeo = '7265787169716979'; // Type 'changegeo' to trigger this command : code: 677265787169716979
var resetgeo = '69836984716979'; // Type 'resetgeo' to trigger this command : code: 8269836984716979

//toggles
var activate = '67847386658469'; // Type 'activate' to trigger this command : code: 6567847386658469

//verify
var showindexes = '73838473786869886983'; // Type 'listindexes' to trigger this command : code: 7673838473786869886983

// rulers
var hideruler = '7368698285766982'; // Type 'hideruler' to trigger this command : code: 727368698285766982

//storage
var clearcache = '766965826765677269'; // Type 'clearcache' to trigger this command : code: 67766965826765677269

//parser
var parseobject = '65828369'; //parse is 80,65,82,83,69

var checktags = '7269677584657183'; // Type 'checktags' to trigger this command : code: 677269677584657183

var formFiller = '73767670798277'; // Type 'fillform' to trigger this command : code: 7073767670798277




///************************************************************
var timechange = 1500; //1.5 seconds between key strokes
var lastKeypressTime = 0;




//validate tags
var idcopy = '';



var timedDelay = function (ms) {
    var t = ms * 3000;
    return t;
}
//Debug Functions
function keycommand(key) {
    var thisKeypressTime = new Date();
    if (thisKeypressTime - lastKeypressTime <= timechange) {
        mydebugger += key;
        switch (mydebugger) {
            case codes:
                //labels
                showdebugcodes('Code specs:', 'codes, newcode, openas, debugon, debugoff, styles, ' +
                    'showauto, showruler, hideruler, listindexes, activate, howit, rr (quick reload)');
                showdebugcodes('Location:', 'showgeo, changegeo, resetgeo');
                showdebugcodes('Navigation totop, tobase, gotoid, scrollto');
                break;
            //Check for Debugger on
            case debugon:
                if (confirm('This will set a cookie to persist the debugger by setting a session variable, and launch a new debugger window./n If you have a pop up blocker, clear that and refresh')) {
                    var debuggerOn = true;
                    sessionStorage['debug'] = debuggerOn;
                    debuggerOn = sessionStorage['debug'];
//                    alert('Ok, your debugger will persist until the end of the session');
                    var log = log4javascript.getDefaultLogger();
                    redirecter('', window.location.pathname)
                }
                else {
                    alert('Ok, no cookie has been set, keep calm and carry on');
                }
                ;
                break;

            //Check for debugger off
            case debugoff:
                if (confirm('Do you want to turn off the debugger?')) {
                    sessionStorage.removeItem('debug');
                    sessionStorage.removeItem('persist');
//                    alert('Debugger and Persist is off');
                } else {
                    log.warn('Nothing to see here folks, carry on');
                }
                break;

            //cases
            //Check for parse request
            case parseobject:
                parseData();
                break;
            //Display all selectors in debugger window
            case styles:
                countCSSRules();
                break;
            //Allow keycode generation for new commands
            case newcode:
                displaySyntax();
                break;
            //scroll to top
            case totop:
                scrollToView('body');
                break;
            //scroll to bottom
            case tobase:
                scrollToView('copyright');
                break;


            case scrollto:
                var topPosition = prompt('What top position would you like to scroll to?');
                $('body').animate({scrollTop: topPosition}, 1000);
                break;

            case gotoid:
                var topPosition = prompt('What id would you like to scroll to?');
                scrollToView(topPosition);
                $('#' + topPosition).addClass('activation-indicator');
                $('#' + topPosition).focus();
                break;

            case activate:
                $('.tile-box').addClass('active');
                log.debug('All tiles have been flipped')
                //flip all tiles on page
                break;

            case mymenu:
                $('.b2s-dropdown-menu').removeClass('ng-hide');
                log.debug('Menu open');

            case openas:
                openAsDevice();
                break;

            case showruler:
                showRuler();
                break;

            case focus:
                logFocus();
                break;

            //Displays automation elements with red border
            case showauto:
                automation();
                break;


            case showgeo:
                getgeo();
                break;
            case changegeo:
                ;
                changeGeoLocation();
                break;
            case resetgeo:
                resetGeoLocation();
                break;
            case clearcache:
                clearCache();
                break;
            case showindexes:
                listIndexes();
                break;

            case hideruler:
                hideRuler();
                break;

            case Reload:
                reloadPage();
                break;

            case formFiller: fillForm(); break;
            case idcopy:
                var copyType = prompt('What kind of copy do you want to identify? (static, data, or copy)');
                switch (copyType) {
                    case 'static':
                        highlightCopy('static');
                        break;
                    case 'data':
                        highlightCopy('data');
                        break;
                    case 'copy':
                        highlightCopy('copy');
                        break;
                    default: //show all
                        highlightCopy();
                        break;
                }
                //scrollToView(topPosition);
                $('#' + topPosition).addClass('activation-indicator');
                $('#' + topPosition).focus();
                break;

            case checktags:
                var tagtocheck = prompt('What tags would you like to check? "p, span, div, h1, h2...');
                var validtags = ["p", "span", "div", "h1", "h2", "h3", "h4", "h5", "h6", "ul", "li", "section", "a", "label"];
                if (validtags.indexOf(tagtocheck) < 0) {
                    alert('Invalid tags specified');
                }
                else {

                    $(tagtocheck).css('border', '1px solid #f00');
                }
                break;
        }

    }
    else {
        mydebugger = '';
    }
    lastKeypressTime = thisKeypressTime;
}
function checkKeycode(e) {
    var keycode;
    if (window.event) keycode = window.event.keyCode; //IE
    else if (e) keycode = e.which; //Non ie
    keycommand(keycode);
//    console.log(keycode);
}
var ran = 0;
function showdebugcodes(label, codelist) {
    if (ran < 1) {
        log.info('Debug codes available:');
        ran++;
    }
    log.info(label);
    log.debug(codelist);
}

function writeKeycode(e) {
    var keycode;
    if (window.event) keycode = window.event.keyCode; //IE
    else if (e) keycode = e.which; //Non ie
    //Turn off listener if user hits 'esc'
    debuggerCall += keycode;
    if (keycode === 27) {
        parseKeyCodes(debuggerCall);
        codeValue = debuggerCall.substring(0, debuggerCall.length - 2);
        debuggerCommand = debuggerCall.substr(2);
        debuggerCommand = debuggerCommand.substring(0, debuggerCommand.length - 2);
        debuggerCall = debuggerCall.substring(0, debuggerCall.length - 2);
        log.debug('Debug section');
        log.info("var " + codeLabel + " = '" + debuggerCommand + "'; // Type '" + codeText + "' to trigger this command : code: " + codeValue);
        log.debug('Case section');
        log.info("case " + codeLabel + ": *Function_Call*(); break;");
        log.error('Closing out the new code listener')
        log.debug('Standard debug calls now activated')
        debuggerCall = ''; //clear debugger call variable
        document.onkeydown = checkKeycode;
    }
}
function displaySyntax() {
    log.debug('Loading new javascript code for debugger');
    codeLabel = prompt('What is the variable name?');
    log.info('Name of debugger call is "' + codeLabel + '"');
    document.onkeydown = writeKeycode; //Adds a key listener
    log.debug('Type in your desired command string');
    log.warn('Press "Esc" button when complete');
}
// function logFocus() {
//     log.debug('Focus running is activated')
//     $('body').keydown(function (e) {
//         var keyPressed = e.keyCode || e.which;
//         if (keyPressed == '9') { // tab
//             var focused = document.activeElement;
//             console.log(focused);
//         }
//     });
// }
function parseKeyCodes(codestring) {
    string = new Array;
    newstring = '';
    var i = 2; //2 characters for each code
    do {
        string.push(String.fromCharCode(codestring.substring(0, 2)));
    }
    while ((codestring = codestring.substring(i, codestring.length)) != '');
    var len = string.length;
    for (var x = 0; x < len; x++) {
        newstring += string[x];
    }
    codeText = newstring.replace(',', '').toLowerCase();
}
//    parseKeyCodes('8479847980');



//Styling Functions
function parseData() {
    var parseObject = prompt('What do you want to parse');
    if (parseObject != null) {
        log.debug('Ok, I will parse \'' + parseObject + '\' for you')
        var chaseDebug = '<div id="chaseDebug" class="debug"> {{' + parseObject + '}}</div>';
        jQuery('#body').append(chaseDebug);
    }
}

function showRuler() {
    var body = document.body, html = document.documentElement;
    var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
    //after we get the total height of the element - base divide by 100 to get the total number of rows we need
    height = height - 10; //so it doesn't pass the bottom of the page - page footer can be accessed by 'tobase'
    var totaltr = Math.round(height / 100);
    var htmlRuler = '<table id="html-ruler" class="ruler">';
    for (var h = 0; h < totaltr; h++) {
        htmlRuler += '<tr><td>' + h + '00</td></tr>';
    }
    htmlRuler += '</table>';
    jQuery('#body').append(htmlRuler);
}


function hideRuler() {
    $('#html-ruler').remove();
}
function scrollToView(target) { //scroll to an ID on the page //example: scrollToView('showNav');
    if ($('#' + target).length > 0) {
        $("html, body").animate({scrollTop: $('#' + target).offset().top}, 1000);
    } else {  // defaults to top of page
        $('html, body').animate({scrollTop: 0}, 1000);
    }
}
function resetWidth(id, width) {
    $('#' + id).css('width', width);
    log.debug('Resized: ' + id + ' successfully to ' + width);
}
function resetyourwidth(cl, width) {
    $('.' + cl).css('width', width);
}
function setContainerWidth(id, child, overflow) {
    var ele = $('#' + id + ' ' + child);
    var count = ele.length;
    var width = ele.outerWidth(true);
//logger('Childred count: '+count+'. Childred width: '+width);
    var finalWidth = count * width;
    $('#' + id).css('overflow', overflow);
    resetWidth(id, finalWidth);
}
function getDimensions(id, metrix) { //Get height and/or width of an element
    var height = $('#' + id).height();
    var width = $('#' + id).width();
//	logger('Height: '+height+', Width: '+width);
    if (metrix == 'w') {
        return (width);
    }
    if (metrix == 'h') {
        return (height);
    }
    if (typeof metrix === 'undefined') {
        return (height + ',' + width);
    }
}
function getPosition(child, parent) {
    var pos = $('#' + child).offset().left;
    var par = $('#' + parent).offset().left;
    var dif = Math.abs(par - pos);
//	logger('Left '+dif);
    return dif;
}
function moveObject(id, direction, amount) {
    var adjust = Math.round(Math.abs(amount));
//	$('#'+id).animate({direction:"'-='"+adjust+"'"}, function(){});
//	$('#sliderComponent').css('left','-60px')
//	logger(id+direction+amount);
    log.debug(id + ',' + direction + ',' + adjust);
    $('#' + id).css({'left': '-' + adjust + 'px'});
}
function whereAmI(elementId) { //return the ending position of the carousel
    var cLeft = $('#' + elementId).position().left;
    var btnId = elementId.replace('scroll-', '');
    var left = Math.abs(cLeft);
}

function log(data) {//Set default log to info type if none is provided
    log.info(data);
}

//Automation
var automatedIds = ['primary-logo']
function automation() {
    log.warn('Displaying automation ready elements');
    for (var x = 0; x < automatedIds.length; x++) {/**/
        var currentId = '#' + automatedIds[x];
        log.debug('Automation id: ' + currentId);
        $(currentId).addClass('hot');
        $(currentId).attr("title", currentId);
    }
}

var showJSON = (function (json, clearPrior) {
    // Pass a JSON object or string and it will be displayed at the bottom of the page.
    if (typeof json != 'string') json = JSON.stringify(json, undefined, 3);
    if (typeof clearPrior != 'boolean') clearPrior = true;
    $(document).ready(function () {
        if (clearPrior) $('#jsonData').remove();
        $('body').append('<div id="jsonData"><pre>' + json + '</pre></div>');
    });
});

function reloadPage() {
    log.debug('Page loaded')
    location.reload();
}
function openAsDevice() {
    var device = prompt('What device would you like to view: iphone or ipad?');
    var url = window.location.href;
    var windowName = 'new window';
    var windowSize = '';
    if (device === 'ipad') {
        windowSize = 'width=768, height=1024, scrollbars=yes';
    } else if (device === 'iphone') {
        //iphone
        windowSize = 'width=320, height=480, scrollbars=yes';
    }
    window.open(url, windowName, windowSize);
    return false;
}

//Geolocation
var Geo = {};
var currentLocation = '';
var geocoder = '';
function getgeo() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(geosuccess, geoerror);
    }
}

function geosuccess(position) {
    Geo.lat = position.coords.latitude;
    Geo.lng = position.coords.longitude;
    geocoder = new google.maps.Geocoder();
    populateHeader(Geo.lat, Geo.lng);
}
function geoerror() {
    log.fatal('No geo location enabled')
}

function populateHeader(lat, lng) {
    log.debug('Geo location latitude:' + lat);
    log.debug('Geo location longitude:' + lng);

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                var currentLocation = results[0].formatted_address;
                log.debug('Current location is: ' + currentLocation)
            }
        }
    })
}
function changeGeoLocation() {
    var goTo = confirm('Feel like teleporting to Tibet?');
    if (goTo) {
        navigator.geolocation.getCurrentPosition = function (spoofsuccess, spooffailure) {
            spoofsuccess({
                //Current office location - without the negative on longitude - sets location to Tibet
                coords: {
                    latitude: 34.0914763, longitude: 84.2509298
                }, timestamp: Date.now()
            });
        }
        getgeo();
    } else {
        log.debug('Ok, still in: ' + currentLocation);
    }
}
function resetGeoLocation() {
    var goTo = confirm('Want to reset your location to the office?');
    if (goTo) {
        navigator.geolocation.getCurrentPosition = function (spoofsuccess, spooffailure) {
            spoofsuccess({
                //Current office location - without the negative on longitude - sets location to Tibet
                coords: {
                    latitude: 34.0914763, longitude: -84.2509298
                }, timestamp: Date.now()
            });
        }
        getgeo();
    } else {
        log.debug('Ok, still in: ' + currentLocation);
    }
}

function listIndexes() {
    var ln = arrayOfIndexedTabs.length;
    log.info(ln + ' object have been automatically indexed by the directive');
    var m = indexStart + 1;
    for (var g = 0; g < ln; g++) {
        log.debug('Field "' + arrayOfIndexedTabs[g] + '" has a tab index of ' + m);
        m++;
    }
}

function cacheClearer() {
    my_cache = confirm('Would you like to clear the browser cache?');
    my_cookies = confirm('Would you like to clear the browser cookies?');

}

function clearCache() {
    var myBrowser = detectBrowser();
    switch (myBrowser) {
        case 'ch':
            log.info('Current Browser: Chrome');
            cacheClearer();
            if (my_cache) {
                log.debug('Cache cleared');
                myCookies.setCookie("JESSIONID", null, -1);
            }
            if (my_cookies) {
                sesh = sessionStorage;
                log.debug('Session and Browser Cookies have cleared');
            }
            break;
        case 'ff':
            log.info('Current Browser: Firefox');
            cacheClearer();
            if (my_cache) {
                log.debug('Cache cleared');
            }
            if (my_cookies) {
                log.debug('Session and Browser Cookies have cleared');
            }
            break;
        case 'ie':
            log.info('Current Browser: Internet Explorer');
            cacheClearer();
            if (my_cache) {
                log.debug('Cache cleared');
            }
            if (my_cookies) {
                log.debug('Session and Browser Cookies have cleared');
            }
            break;
        default:
            log.warn('Invalid browser - you will have to clear the cache directly');
            log.fatal(agent);
            log.warn('Please send an email to aspencer@bridge2solutions.com with your browser info and request it be added');
    }
}


function highlightCopy(copy) {
    if (typeof(copy) === 'undefined') {
        copy = "default"; // or whatever default value you want
        log.debug('No input');
    } else {
        $('.' + copy).addClass('copy' + copy);
    }
}


function setCookieForBalance() {
    document.cookie = "GWURRefresh=true;path=/;secure=secure;domain=.chase.com";
}
function fillForm(){
    $('#contactName').val('First Last');
    $('#contactEmail').val('email@example.com');
    $('#contactSubject').val('example subject');
    $('#contactMessage').val('example message');
    log.debug('Form filled')
}

// TODO
// add 'expand' feature for debugging json files - loading them in console