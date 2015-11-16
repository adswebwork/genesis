var debug = false;
var log = { //Sets the logging functions to blank to avoid breaks
    trace: function () { },
    debug: function () { },
    info: function () { },
    error: function () { },
    fatal: function () { },
    warn: function () { }
}

function formatMoney(number) {
    return number.toFixed(0).replace(/./g, function (c, i, a) {
        return i > 0 && c !== "." && ((a.length - i) % 3 == 0) ? ',' + c : c;
    })
}
