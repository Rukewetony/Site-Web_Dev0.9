var path         = require("path");
var gutil        = require('gulp-util');
var through      = require('through2');
var prettyHrtime = require('pretty-hrtime');
var _            = require('lodash');
_.mixin(require('lodash-deep'));

var VALUE_REGEXP = /<%=\s*([^\s]+)\s*%>/g;

function notify(style, before, message, after, data) {
    var text, variable;
    var tokens = message.split(VALUE_REGEXP);
    var result = '';

    switch (style) {
        case "info":
            text     = gutil.colors.cyan;
            variable = gutil.colors.cyan.bold;
            break;
        case "success":
            text     = gutil.colors.green;
            variable = gutil.colors.green.bold;
            break;
        case "warning":
            text     = gutil.colors.yellow;
            variable = gutil.colors.yellow.bold;
            break;
        case "error":
            text     = gutil.colors.red;
            variable = gutil.colors.red.bold;
            break;
        case "note":
            text     = gutil.colors.gray;
            variable = gutil.colors.white;
            break;
        case "time":
            text     = gutil.colors.magenta;
            variable = gutil.colors.magenta.bold;
            break;
        default:
            text     = gutil.colors.gray;
            variable = gutil.colors.white;
    }

    for (var i = 0; i < tokens.length; i++) {
        if (i%2) {
            result += variable(_.deepGet(data, tokens[i]) || '');
        } else {
            result += text(tokens[i] || '');
        }
    }

    function setLine(line) {
        if (!line) return;

        var result = '';

        for (var i = 0; i < 40; i++) {
            result += line;
        }
        gutil.log(text(result));
    }

    setLine(before);
    gutil.log(result);
    setLine(after);
}

function getArgs(args) {
    var result = {
        before:  args[0],
        message: args[1],
        after:   args[2],
        data:    args[3]
    };

    if (typeof args[1] !== 'string') {
        result.before  = null;
        result.message = args[0];
        result.after   = null;
        result.data    = args[1];

    } else if (typeof args[2] !== 'string') {
        result.before  = args[0];
        result.message = args[1];
        result.after   = null;
        result.data    = args[2];
    }

    result.data = _.merge({env: process.env}, result.data);

    return result;
}

function msg(style, useFlush) {
    var totalStart    = process.hrtime();

    return function() {
        var args     = getArgs(arguments);
        var lastFile = {};
        var start    = process.hrtime();

        function transform(file, enc, callback) {
            lastFile = file;

            if (!useFlush) {
                args.data.file          = _.clone(file);
                args.data.file.relative = path.relative(file.base, file.path);
                args.data.file.basename = path.basename(file.path);
                args.data.duration      = prettyHrtime(process.hrtime(start));
                args.data.totalDuration = prettyHrtime(process.hrtime(totalStart));

                notify(style, args.before, args.message, args.after, args.data);
            }
            callback(null, file);
        }

        function flush(callback) {
            if (useFlush) {
                args.data.file          = _.clone(lastFile);
                args.data.duration      = prettyHrtime(process.hrtime(start));
                args.data.totalDuration = prettyHrtime(process.hrtime(totalStart));

                notify(style, args.before, args.message, args.after, args.data);
            }
            callback();
        }

        return through.obj(transform, flush);
    };
}

function Msg(style) {
    return function() {
        var args = getArgs(arguments);

        notify(style, args.before, args.message, args.after, args.data);
    };
}


module.exports = {
    info:    msg('info'),
    success: msg('success'),
    warning: msg('warning'),
    error:   msg('error'),
    note:    msg('note'),
    time:    msg('time'),
    flush: {
        info:    msg('info', true),
        success: msg('success', true),
        warning: msg('warning', true),
        error:   msg('error', true),
        note:    msg('note', true),
        time:    msg('time', true)
    },
    Info:    Msg('info'),
    Success: Msg('success'),
    Warning: Msg('warning'),
    Error:   Msg('error'),
    Note:    Msg('note'),
    Time:    Msg('time')
};