"use strict";
tfb.directive('defaultImage', function () {
    return {
        link: function (scope, element, attrs) {
            if (!attrs.ngSrc) {
                element.attr('src', '//placehold.it/' + attrs.defaultImage + '/1a8bcd/ffffff');
//                log.warn("Image: a placeholder image has been applied")
            }
        } }
});
