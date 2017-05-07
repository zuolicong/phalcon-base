define(function(require, exports, module) {

    var storage = {};
    
    exports.get() = function(key, def){
        if (undefined === storage[key]) {
            return def;
        } else {
            return storage[key];
        }
    };

    exports.set(key, value) = function(key, value) {
        storage[key] = value;
        return exports;
    };
});
