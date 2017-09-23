<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/Applications/MAMP/htdocs/yanvote/public/../application/index/view/user/login.html";i:1505789607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>jQuery WeUI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <link rel="stylesheet" href="__STATIC__/index/weui/lib/weui.min.css">
    <link rel="stylesheet" href="__STATIC__/index/weui/css/jquery-weui.css">
    <script src="__STATIC__/index/weui/lib/jquery-2.1.4.js"></script>
    <script src="__STATIC__/index/weui/js/jquery-weui.js"></script>
</head>

<body ontouchstart="">

<!--主体部分 开始-->
<div class="content">
    <div class="content-block">
        <div class="login_logo"> <img src="/Public/sstm/imagesm/member/login_logo.png"></div>

        <form method="post" data-url="<?php echo url('user/logincheck'); ?>" id="formlogin">
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">姓名</label>
                    </div>
                    <div class="weui-cell__bd weui-cell_primary">
                        <input class="weui-input" type="text" placeholder="请输入姓名" name="username" id="text" value="">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">密码</label>
                    </div>
                    <div class="weui-cell__bd weui-cell_primary">
                        <input class="weui-input" placeholder="请输入学号" type="password" name="sid" id="password" value="">
                    </div>
                </div>
            </div>
        </form>

        <div class="weui-btn-area">
            <a class="weui-btn weui-btn_primary" id="conf">登录</a>
        </div>

        <script>

            $('#conf').click(function () {
                var data = $("#formlogin").serialize();
                var url = $("#formlogin").attr('data-url');
                $.post(url, data, function (msg) {

                    if (msg.status == 0) {
                        $.toast(msg.info);
                        setTimeout(function () {
                            location.href = msg.url;
                        }, 200);
                    } else {
                        $.toast(msg.info);
                    }
                }, 'json');
            })
        </script>

    </div>
</div>
<!--主体部分 结束-->

</body>

</html>