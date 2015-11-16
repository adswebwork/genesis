function countCSSRules() {
    log.info('Debugger on for css rules and selectors');
    var results = '',
        logs = '',
        ruleLength = '',
        total = '';

    if (!document.styleSheets) {
        return;
    }
    for (var i = 0; i < document.styleSheets.length; i++) {
        try {
            countSheet(document.styleSheets[i]);
        } catch (e) {
        }
    }
    function countSheet(sheet) {
        var count = 0;
        if (sheet && sheet.cssRules) {
            for (var j = 0, l = sheet.cssRules.length; j < l; j++) {
                if (!sheet.cssRules[j].selectorText) {
                    continue;
                }
                count += sheet.cssRules[j].selectorText.split(',').length;
            }
            total  = count + sheet.cssRules.length;

            logs += '\nFile: ' + (sheet.href ? sheet.href : 'inline <style> tag');
            logs += '\nRules: ' + sheet.cssRules.length;
            logs += '\nSelectors: ' + count;
            logs += '\nTotal: '+ total;
            logs += '\n--------------------------';
            if (count >= 4096) {
                results += '\n****\nWARNING:\n There are ' + count + ' CSS rules in the stylesheet ' + sheet.href + ' - IE will ignore the last ' + (count - 4096) + ' rules!\n';
            }
        }
    }

    log.debug(logs);
    if (results) {
        log.debug(results);
    }
};
