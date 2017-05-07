define(function(require, exports) {
    var hash_lib = require('common/hash');

    var elements;

    var hash_change = function() {
        var freg = window.location.hash;
        var nav = hash_lib.get('nav');
        if (nav) {
            var tab_element = elements.find('a[href="' + nav + '"]:first');
        } else {
            var tab_element = elements.find("a:first");
        }
        if ("true" !== tab_element.attr("aria-expanded")) {
            tab_element.trigger('click');
        }
    };

    var bind_click = function () {
        elements.on('click',"a", function() {
            var href = $(this).attr('href');
            console.log(href);
            if (href != hash_lib.get('nav')) {
                window.location.hash = href;
            }
        });
    };

    exports.init = function (_elements) {
        elements =  _elements;
        bind_click();
        hash_change();
    };
    exports.onhashchange = function () {
        hash_change();
    };
});
