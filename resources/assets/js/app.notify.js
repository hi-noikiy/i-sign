var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};
function show_stack_bottomright(type, msg='操作提示', delay_time=2000) {
    var opts = {
        title: "Over Here",
        text: msg,
        addclass: "stack-bottomright",
        stack: stack_bottomright,
        delay: delay_time,
        hide: true
    };
    switch (type) {
        case 'error':
            opts.title = "错误提示";
            opts.type = "error";
            break;
        case 'info':
            opts.title = "提示信息";
            opts.type = "info";
            break;
        case 'success':
            opts.title = "操作成功";
            opts.type = "success";
            break;
    }
    new PNotify(opts);
}

function show_stack_errors(errors) {

    if(errors) {
        _.forEach(errors.data, function (n) {
            show_stack_bottomright('error', n, 4000)
        });
    } else {
        show_stack_bottomright('error', '服务器开小差了!');
    }
}


PNotify.prototype.options.styling = "fontawesome";
export {show_stack_bottomright, show_stack_errors};