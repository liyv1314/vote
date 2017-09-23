<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/position/index.html";i:1505724854;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/header.html";i:1505724975;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/footer.html";i:1505717316;}*/ ?>
<!--包含头部文件-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="__STATIC__/admin/layui/css/layui.css">
    <link rel="stylesheet" href="__STATIC__/admin/layui/css/modules/code.css">
    <script src="__STATIC__/admin/layui/layui.js"></script>
    <script src="__STATIC__/admin/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">投票管理系统</div>

        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1505717657040&di=e65c43710669c813250d754e2451234b&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201312%2F05%2F20131205172424_FQzWK.thumb.224_0.jpeg" class="layui-nav-img">
                    admin
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item"><a href="<?php echo url('index/index'); ?>">概览</a></li>
                <li class="layui-nav-item"><a href="<?php echo url('campaign/index'); ?>">候选人</a></li>
                <li class="layui-nav-item"><a href="<?php echo url('position/index'); ?>">职位</a></li>
                <li class="layui-nav-item"><a href="<?php echo url('user/index'); ?>">投票用户</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>添加职位</legend>
            </fieldset>

            <form class="layui-form" method="post" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">职位</label>
                    <div class="layui-input-block">
                        <input type="text" name="position" required  lay-verify="required" placeholder="请输入职位名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <!--<div class="layui-form-item">-->
                    <!--<label class="layui-form-label">密码框</label>-->
                    <!--<div class="layui-input-inline">-->
                        <!--<input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">-->
                    <!--</div>-->
                    <!--<div class="layui-form-mid layui-word-aux">辅助文字</div>-->
                <!--</div>-->

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>职位列表</legend>
            </fieldset>
            <table class="layui-table" id="candidate">
                <thead>
                <tr>
                    <th lay-data="{field:'id', width:80}">ID</th>
                    <th lay-data="{field:'position', width:80}">职位名称</th>
                </tr>
                </thead>

                <tbody>
                <?php if(is_array($position) || $position instanceof \think\Collection): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['position']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function(data){
//                layer.msg(JSON.stringify(data.field));
//                return false;
            });
        });


    </script>

    <!--包含footer文件-->
    <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
</div>
</div>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>