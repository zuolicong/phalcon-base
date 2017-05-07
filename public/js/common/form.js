/**
 * 表单处理组件，把form表单改为ajax
 * 该组件会收集form下面的input，并根据form的method,action属性来发请求
 */
define(function(require, exports, module) {
    function formWapper(_form) {
        this.form = _form;
        this.form_data = new FormData(this.form[0]);
        this.action = this.form.attr('action');

        var method = this.form.attr('method');
        this.method  = method ? method.toUpperCase() : 'GET';

        this.get = function(name) {
            return this.form_data.get(name);
        };
        this.getData = function(filterEmpty=true) {
            var params = {};
            for (let k of this.form_data.keys()) {
                var v = this.form_data.get(k);
                if (filterEmpty && '' === v) {
                    continue;
                }
                params[k] = v;
            }
            return params;
        };
    }

    exports.createNew = function(_form) {
        return new formWapper(_form);
    };
});
