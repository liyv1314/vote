<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/user/index.html";i:1505732136;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/header.html";i:1505817768;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/footer.html";i:1505717316;}*/ ?>
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
                <li class="layui-nav-item"><a href="<?php echo url('record/index'); ?>">投票记录</a></li>
                <li class="layui-nav-item"><a href="<?php echo url('user/index'); ?>">投票用户</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>添加投票用户</legend>
            </fieldset>


            <form class="layui-form" action="" method="post">
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" required  lay-verify="required" placeholder="请输入投票人姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">学号</label>
                    <div class="layui-input-block">
                        <input type="text" name="sid" required  lay-verify="required" placeholder="请输入投票人学号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>



            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>投票用户列表</legend>
            </fieldset>
            <table class="layui-table" id="voteuser">
                <thead>
                <tr>
                    <th lay-data="{field:'id', width:80}">ID</th>
                    <th lay-data="{field:'username', width:80}">投票用户姓名</th>
                    <th lay-data="{field:'sid', width:80}">投票用户学号</th>
                </tr>
                </thead>

                <tbody>
                <?php if(is_array($user) || $user instanceof \think\Collection): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['username']; ?></td>
                    <td><?php echo $vo['sid']; ?></td>
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