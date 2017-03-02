"use strict";
function MainController($scope, $http, SUPPORT_URL, sessionService, AuthService, $location) {
    $scope.verify = function () {
        AuthService.verify($scope);
    };


    var logindata = '';
    $scope.loggedin = '';
    $scope.registration = [];
    $scope.recruitemail = [];
    var un = sessionService.get('memberid');
    var ai = sessionService.get('authkey');

    $scope.processLogin = function () {
        logindata = $scope.userLogin;
        if (!$scope.member) {
            log.info('function call: processLogin');
            log.info('post request sent to: ' + SUPPORT_URL.urlLogin);
            log.info('with credentials: ' + JSON.stringify(logindata));
            $http({method: "POST", url: SUPPORT_URL.urlLogin, data: logindata}).
                success(function (data) {
                    if (data.success) {
                        log.debug('successful ping');
                        $scope.logstatus = true;
                        sessionService.set('memberid', data.user.email);
                        sessionService.set('authkey', data.user.authkey);
                        sessionService.set('user', JSON.stringify(data));
                        $scope.user = data;
                        $scope.member = data.user;
                        $scope.recruits = data.user.recruits;
                        $scope.count = data.user.recruitcount;
$scope.logmsg = '';
                        $scope.registration.recruitername = $scope.user['name'];
                        $scope.registration.recruiterid = $scope.user['uid'];
                        $scope.registration.message = 'Check out this great opportunity:\r\nhttp://teamefffbee.com/member/' + $scope.uniquewebsite;

                        $scope.recruitemail.sender = $scope.user['name'];
                        $scope.recruitemail.subject = 'Your Official Backstage Pass - From ' + $scope.user['name'];

//                        $location.path('/profile/' + $scope.memberid);
                        $scope.errorLabel = '';
                        $scope.errorMsg = '';
                        redirecter('','/teameffbee.com/');
//                        $location.path('/teameffbee.com/members/profile');
                    }
                    else {
                        log.error('invalid login')
                        $scope.errorLabel = 'Error: ';
                        $scope.errorMsg = 'Invalid email or password';
                    }
                    console.log(JSON.stringify(data));
                }).error(function () {
                    $scope.errorLabel = 'Error: ';
                    $scope.errorMsg = 'Invalid email or password';
                    log.error('failed to process the login: "processLogin" ');
                });
        } else {
            log.warn('member not logged in');
            return true;
        }
    };

    $scope.processRegistration = function () {
        var postingData = $scope.registration;
        console.log('processing the registration form')
        $http({method: "POST", url: urlRegister, data: postingData}).
            success(function (data) {
                if (data.success) {
                    $('#register').modal('hide')
                    $location.path('/process');
                    confirmed = $timeout(function () {
                        $location.path('/registered')
                    }, 3000)
                    $scope.errorLabel = '';
                    $scope.errorMsg = '';
                }
                else {
                    $scope.errorLabel = '';
                    $scope.errorMsg = data['message'];
                }
            }).error(function (data) {
            });
    };

    $scope.logout = function () {
        AuthService.logout();
        $scope.logstatus = false;
        $scope.member = $scope.user = $scope.recruits = '';
        $scope.logmsg = 'You have successfully logged out';
        $location.path('/');
    };


    $scope.loadTestimonials = function () {
        log.warn('Testimonials Triggered');
//        if ($('.testimonials-area .slider').length) {
        $('.testimonials-area .slider').bxSlider({
            adaptiveHeight: true,
            auto: true,
            controls: true,
            pause: 5000,
            speed: 500,
            mode: 'fade',
            pager: false
        });
    };
//    }
    $scope.loadSponsorSlider = function () {
        //Sponsors Slider
        if ($('.sponsors .slider').length) {
            $('.sponsors .slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                autoplay: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    1024: {
                        items: 4
                    },
                    1100: {
                        items: 5
                    }
                }
            });
        }

    }
    $scope.loadSlider = function () {
        log.warn('Main slider Triggered');
        //Main Slider
        if ($('.main-slider').length) {

            jQuery('.tp-banner').show().revolution({
                delay: 7500,
                startwidth: 1200,
                startheight: 700,
                hideThumbs: 600,

                thumbWidth: 80,
                thumbHeight: 50,
                thumbAmount: 5,

                navigationType: "bullet",
                navigationArrows: "0",
                navigationStyle: "preview4",

                touchenabled: "on",
                onHoverStop: "on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

                keyboardNavigation: "off",

                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",

                spinner: "spinner4",

                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: "off",

                autoHeight: "off",
                forceFullWidth: "on",

                hideThumbsOnMobile: "on",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "on",
                hideArrowsOnMobile: "on",
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "",
                fullScreenOffsetContainer: ".main-slider"
            });
        }
    }
    $scope.getSiteData = function () {
        var contentSrc = SUPPORT_URL.datasrc;
        $http({method: "GET", url: contentSrc}).
            success(function (data) {
                $scope.content = data.content;
                $scope.images = data.images;
                $scope.programs = data.programs;
                $scope.company = data.company;
                return  true;
            })
            .error(function (data, status, headers, config) {
            });

    };
    $scope.success = 'false';
    $scope.containerLabel = 'get in touch';
    $scope.processForm = function () {
        log.info("Form processor triggered")
        var formdata = $scope.contactForm;
        log.debug(formdata);
        $http({method: "POST", url: SUPPORT_URL.contactUrl, data: formdata}).
            success(function (data) {
                $scope.success = 'true';
                $scope.successMessage = data.message;
                $scope.containerLabel = 'Successful contact';
            })
            .error(function (data) {
                $scope.errorLabel = 'Error: ';
                $scope.errorMsg = 'We are unable to process your form at this time, please try again later';
            });
    }
    $scope.contactMap = function () {
        // Google Map Settings
        if ($('#map-location').length) {
            var map;
            map = new GMaps({
                el: '#map-location',
                zoom: 12,
                scrollwheel: false,
                //Set Latitude and Longitude Here
                lat: -37.817085,
                lng: 144.955631
            });

            //Add map Marker
            map.addMarker({
                lat: -37.817085,
                lng: 144.955631,
                infoWindow: {
                    content: '<p><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
                }

            });
        }

    }
    $scope.contactForm = function () {

        if ($('#contact-form').length) {
            $('#contact-form').validate({ // initialize the plugin
                rules: {
                    username: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    subject: {
                        required: true
                    },
                    message: {
                        required: true
                    }
                }
            });
        }
    }
    $scope.runTimer = function () {

        if ($('#countdown-timer').length) {
            $('#countdown-timer').countdown('2015/10/13', function (event) {
                var $this = $(this).html(event.strftime('' + '<div class="counter-column"><span class="count">%d</span><span class="colon">:</span><br>DAYS</div> ' + '<div class="counter-column"><span class="count">%H</span><span class="colon">:</span><br>HOURS</div>  ' + '<div class="counter-column"><span class="count">%M</span><span class="colon">:</span><br>MINUTES</div>  ' + '<div class="counter-column"><span class="count">%S</span><br>SECOND</div>'));
            });
        }


        $('.fact-counter.animated .counter-column').each(function () {
            var $t = $(this),
                n = $t.find(".count-text").attr("data-stop"),
                r = parseInt($t.find(".count-text").attr("data-speed"), 10);

            if (!$t.hasClass("counted")) {
                $t.addClass("counted");
                $({
                    countNum: $t.find(".count-text").text()
                }).animate({
                    countNum: n
                }, {
                    duration: r,
                    easing: "linear",
                    step: function () {
                        $t.find(".count-text").text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $t.find(".count-text").text(this.countNum);
                    }
                });
            }

        });

    }
    $scope.runGallery = function () {

        $('.lightbox-image').fancybox();

        if ($('#image-gallery-mix').length) {
            $('#image-gallery-mix').find('.fancybox').fancybox();
        }
        ;


        if ($('#image-gallery-mix').length) {
            $('.gallery-filter').find('li').each(function () {
                $(this).addClass('filter');
            });
            $('#image-gallery-mix').mixItUp();
        }
        ;
        if ($('.gallery-filter.masonary').length) {
            $('.gallery-filter.masonary span').on('click', function () {
                var selector = $(this).parent().attr('data-filter');
                $('.gallery-filter.masonary span').parent().removeClass('active');
                $(this).parent().addClass('active');
                $('#image-gallery-isotope').isotope({ filter: selector });
                return false;
            });
        }

    }
    $scope.activateWow = function () {
//Schedule Box Tabs
        if ($('.schedule-box').length) {

            //Tabs
            $('.schedule-box .tab-btn').on('click', function () {
                var target = $($(this).attr('data-id'));
                $('.schedule-box .tab-btn').removeClass('active');
                $(this).addClass('active');
                $('.schedule-box .tab').fadeOut(0);
                $('.schedule-box .tab').removeClass('current');
                $(target).fadeIn(300);
                $(target).addClass('current');
                var windowWidth = $(window).width();
                if (windowWidth <= 700) {
                    $('html, body').animate({
                        scrollTop: $('.tabs-box').offset().top
                    }, 1000);
                }
            });

            //Accordion
            $('.schedule-box .hour-box .toggle-btn').on('click', function () {
                var target = $($(this).next('.content-box'));
                $(this).toggleClass('active');
                $(target).slideToggle(300);
                $(target).parents('.hour-box').toggleClass('active-box');
            });

        }
        if ($('.wow').length) {
            var wow = new WOW(
                {
                    boxClass: 'wow',      // animated element css class (default is wow)
                    animateClass: 'animated', // animation css class (default is animated)
                    offset: 0,          // distance to the element when triggering the animation (default is 0)
                    mobile: true,       // trigger animations on mobile devices (default is true)
                    live: true       // act on asynchronously loaded content (default is true)
                }
            );
            wow.init();
        }
    }
    var confirmed = '';
    $scope.processRecruit = function () {
        var postingData = $scope.recruitemail;
        $http({method: "POST", url: urlRecruit, data: postingData}).
            success(function (data) {
                if (data.success) {
                    $('#recruit').modal('hide')
                    console.log('Processing')
                    $location.path('/process');
                    $scope.recruitSuccess = true;
                    confirmed = $timeout(function () {
                        $location.path('/recruit')
                    }, 3000)
                }
                else {
                    $scope.errorLabel = '';
                    $scope.errorMsg = data['message'];
                    console.log(data)
                }
            }).error(function (data) {
                console.log('No post')
            });
    };

}


function OpportunityController($scope, $http, SUPPORT_URL) {
    log.info('Opportunity Controller Loaded');
}
function EventsController($scope, $http, SUPPORT_URL) {
    log.info('Events Controller Loaded');
}
function ShowsController($scope, $http, SUPPORT_URL) {
    log.info('Shows Controller Loaded');
}
function ContactController($scope, $http, SUPPORT_URL) {
    log.info('Contact Controller Loaded');

}

function UserCtrl($scope, $http, $location) {
    //restrict users from free access to profiles
    if ($scope.loggedin) {
        log.info('logged in');
    } else {
        $location.path('/');
    }
}

function MembersController($scope, $location) {
    log.debug('Members Controller Initialized')
}

function AccessCtrl($scope, $location) {
    if ($scope.loggedin) {
    } else {
        $location.path('/');
    }
}

function DisplayCtrl($scope, $location, $routeParams, $http) {
    var urlMember = 'process/member.php';
    var user = $routeParams.membername;
    var postingData = '{"website" : "' + user + '"}';
    $http({method: "POST", url: urlMember, data: postingData}).
        success(function (data) {
            if (data.user) {
                $scope.user = data.user;
                $scope.errorLabel = '';
                $scope.errorMsg = '';
                $scope.registration.recruitername = $scope.user['name'];
                $scope.registration.recruiterid = $scope.user['id'];
                $scope.registration.recruiterid = $scope.user['id'];
                $scope.recruitemail.message = '';//Check out this great opportunity:\r\nhttp://teamfb.com/member/'+ user;
                $scope.membername = $scope.user['name'];
            }
            else {
                $scope.errorLabel = '';
                $scope.errorMsg = data['message'];
            }

        }).error(function (data) {
            console.log(data)
        });
}






