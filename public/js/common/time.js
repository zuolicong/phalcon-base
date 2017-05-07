define(function(require, exports, module) {

    exports.getFormatDate = function (date, separator) {

        var userDate = new Date(date);

        var year = userDate.getFullYear();
        var month = userDate.getMonth() + 1;
        var day = userDate.getDate();

        if (month < 10) {
            month = '0' + month;
        }

        if (day < 10) {
            day = '0' + day;
        }

        if (arguments.length === 1) {
            separator = '';
        }

        return year + separator
            +  month + separator
            +  day;
    };

    /**
     * 获取HHMMSS的时间类型
     * @param  {number} date 12位标准时间
     * @param  {string} separator 自定义分隔符 默认空字符串
     * @return {string}      日期格式
     */
    exports.getFormatTime = function (date, separator) {
        var userDate = new Date(date);

        var hour = userDate.getHours();
        var minute = userDate.getMinutes();
        var second = userDate.getSeconds();

        if (hour < 10) {
            hour = '0' + hour;
        }

        if (minute < 10) {
            minute = '0' + minute;
        }

        if (second < 10) {
            second = '0' + second;
        }

        if (arguments.length === 1) {
            separator = '';
        }

        return hour + separator
            +  minute + separator
            + second;
    };

    exports.getFormatDateTime = function (timestamp) {
        ts = timestamp * 1000;
        return exports.getFormatDate(ts, '-') + ' ' + exports.getFormatTime(ts, ':');
    };
});
