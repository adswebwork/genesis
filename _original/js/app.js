"use strict";
var tfb = angular.module("teameffbee", ['ngSanitize', 'ngRoute']);


tfb.constant("SUPPORT_URL", {
    apipath: "http://support.adswebwork.com/dist/api/",
    datasrc: "data/content.json",
    contactUrl: "data/processData.php",
    siteRoot: "/teameffbee.com/",
    urlRegister: 'process/register.php',
    urlRecruit: 'process/recruit.php',
    urlLogin: 'process/login.php',
    urlLogout: 'process/logout.php',
    urlConfirm: 'process/confirm.php',
    apiversion: 1
});

//tfb.use(function (req,res){
//    res.sendfile(__dirname + '/index.php');
//});

tfb.config(["$locationProvider", "$routeProvider", "SUPPORT_URL", function ($locationProvider, $routeProvider, SUPPORT_URL) {

    $routeProvider.when("/", {redirectTo: SUPPORT_URL.siteRoot})
        .when(SUPPORT_URL.siteRoot, { templateUrl: SUPPORT_URL.siteRoot + "views/home.php", controller: "MainController"})

        .when(SUPPORT_URL.siteRoot + "opportunity", {templateUrl: SUPPORT_URL.siteRoot + "views/opportunity.php", controller: "OpportunityController"})
        .when(SUPPORT_URL.siteRoot + "opportunity/recruitment", {templateUrl: SUPPORT_URL.siteRoot + "views/opportunity_recruitment.php", controller: "OpportunityController"})
        .when(SUPPORT_URL.siteRoot + "opportunity/sales", {templateUrl: SUPPORT_URL.siteRoot + "views/opportunity_sales.php", controller: "OpportunityController"})
        .when(SUPPORT_URL.siteRoot + "opportunity/hostanevent", {templateUrl: SUPPORT_URL.siteRoot + "views/opportunity_host_an_event.php", controller: "OpportunityController"})

        .when(SUPPORT_URL.siteRoot + "about", {templateUrl: SUPPORT_URL.siteRoot + "views/about.php"})
        .when(SUPPORT_URL.siteRoot + "about/teameffbee", {templateUrl: SUPPORT_URL.siteRoot + "views/about_teameffbee.php"})
        .when(SUPPORT_URL.siteRoot + "about/lwp", {templateUrl: SUPPORT_URL.siteRoot + "views/about_lancewinnzpresents.php"})
        .when(SUPPORT_URL.siteRoot + "about/faq", {templateUrl: SUPPORT_URL.siteRoot + "views/about_faq.php"})

        .when(SUPPORT_URL.siteRoot + "events", {templateUrl: SUPPORT_URL.siteRoot + "views/events_schedule.php", controller: "EventsController"})
        .when(SUPPORT_URL.siteRoot + "events/gallery", {templateUrl: SUPPORT_URL.siteRoot + "views/events_gallery.php", controller: "EventsController"})
        .when(SUPPORT_URL.siteRoot + "events/media", {templateUrl: SUPPORT_URL.siteRoot + "views/events_mediainteractions.php", controller: "EventsController"})

        .when(SUPPORT_URL.siteRoot + "tvshow", {templateUrl: SUPPORT_URL.siteRoot + "views/tvshow.php", controller: "ShowsController"})
        .when(SUPPORT_URL.siteRoot + "tvshow/auditions", {templateUrl: SUPPORT_URL.siteRoot + "views/tvshow_auditions.php", controller: "ShowsController"})
        .when(SUPPORT_URL.siteRoot + "tvshow/episodes", {templateUrl: SUPPORT_URL.siteRoot + "views/tvshow_episodes.php", controller: "ShowsController"})


        .when(SUPPORT_URL.siteRoot + "members", {templateUrl: SUPPORT_URL.siteRoot + "views/member.php", controller: "ShowsController"})
        .when(SUPPORT_URL.siteRoot + "members/profile", {templateUrl: SUPPORT_URL.siteRoot + "views/member_profile.php", controller: "MembersController"})
        .when(SUPPORT_URL.siteRoot + "members/recruits", {templateUrl: SUPPORT_URL.siteRoot + "views/member_recruits.php", controller: "MembersController"})
        .when(SUPPORT_URL.siteRoot + "members/signup", {templateUrl: SUPPORT_URL.siteRoot + "views/member_signup.php", controller: "MembersController"})
        .when(SUPPORT_URL.siteRoot + "members/signup/:membername", {templateUrl: SUPPORT_URL.siteRoot + "views/member_signup.php", controller: "MembersController"})
        .when(SUPPORT_URL.siteRoot + "members/signout", {templateUrl: SUPPORT_URL.siteRoot + "views/member_signout.php", controller: "MembersController"})

        .when(SUPPORT_URL.siteRoot + "contact", {templateUrl: SUPPORT_URL.siteRoot + "views/contact.php", controller: "ContactController"})
        .otherwise({redirectTo: SUPPORT_URL.siteRoot});

    $locationProvider.html5Mode(true).hashPrefix('!');
    $locationProvider.html5Mode(true);
}]);
