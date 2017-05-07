define(function(require, exports, module) {

    var hash_params = {};
    var inited = false;
    
    exports.init = function () {
        var freg = window.location.hash;
        var arr = freg.split('&');
        hash_params = {};
        hash_params['nav'] = arr[0];
        for (var i = 0, len = arr.length; i < len; i++) {
            var pair = arr[i].split('=');
            if (2 == pair.length) {
                hash_params[pair[0]] = pair[1];
            }
        }
        console.log("hash_lib init");
        inited = true;
    };

    exports.get = function (key, def) {
        if (!inited) {
            exports.init();
        }
        if (undefined === key) {
            return hash_params;
        }
        return (undefined !== hash_params[key]) ? hash_params[key] : def;
    };

    exports.getNavParam = function (nav, key, def) {
        var cur_nav = this.get('nav');
        return (cur_nav == nav) ? this.get(key, def) : def;
    };

    exports.onhashchange = function () {
        exports.init();
    };
});
