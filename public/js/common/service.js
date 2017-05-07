define(function(require, exports, module) {

    exports.lastSubmit = undefined;
    /**
     * 处理response
     */
    exports.responseHandle = function(res, onSuccess, onFail) {
        if (0 == res.code) {
            if (onSuccess) {
                onSuccess(res);
            } else {
                alert('成功');
            }
        } else {
            if (onFail) {
                onFail(res);
            } else {
                alert(res.msg);
            }
        }
        return true;
    };

    exports.responseHandleWapper = function (onSuccess, onFail) {
        return function (res, st) {
            exports.responseHandle(res, onSuccess, onFail);
        };
    };

   /**
    * 把表单转为异步提交
    */
    exports.formAjax = function (form, onSuccess, onFail) {
        var form_lib = require('common/form');
        var submit = form.find(".submit");
        submit.on('click', function() {
            var params = form_lib.getData(form);
            var path = form.attr('action');
            var method = form.attr('method');
            var blank = form.attr('target');
            console.log(params);
            exports.lastSubmit = this;
            $.ajax(path, {
                type: method ? method.toUpperCase() : 'GET',
                data: params,
                dataType: "json",
                success: exports.responseHandleWapper(onSuccess, onFail)
            });
        });
    };


});
