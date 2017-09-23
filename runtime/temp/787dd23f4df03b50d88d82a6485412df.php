<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/login/index.html";i:1505721288;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="__STATIC__/admin/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/admin/layui/css/modules/code.css">
    <script src="__STATIC__/admin/layui/layui.js"></script>
</head>
<body>
<div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <form class="layui-form" method="post" action="" style="width:500px;height:200px;margin:200px auto">
            <div class="layui-form-item">
                <label class="layui-form-label">账号</label>
                <div class="layui-input-inline">
                    <input type="text" name="account" required  lay-verify="required" placeholder="请输入账号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码框</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
//            layer.msg(JSON.stringify(data.field));
//            return false;
        });
    });
</script>

</body>