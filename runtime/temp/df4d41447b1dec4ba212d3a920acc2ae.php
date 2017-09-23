<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/record/index.html";i:1505818248;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/header.html";i:1505818568;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/footer.html";i:1505717316;}*/ ?>
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
    <style>
        /*分页样式*/
        .pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
        .pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;}
        .pagination .active{background-color: #46A3FF;color: #fff;}
        .pagination .disabled{color:#aaa;}
    </style>
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
                <legend>投票记录</legend>
            </fieldset>
            <table class="layui-table" id="candidate">
                <thead>
                <tr>
                    <th lay-data="{width:80}">ID</th>
                    <th lay-data="{width:80}">投票人姓名</th>
                    <th lay-data="{width:80}">竞选人姓名</th>
                    <th lay-data="{width:80}">竞选职位</th>

                </tr>
                </thead>

                <tbody>
                <?php if(is_array($record) || $record instanceof \think\Collection): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['user']['username']; ?></td>
                    <td><?php echo $vo['campaign']['username']; ?></td>
                    <td><?php echo $vo['campaign']['position']['position']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <?php echo $page; ?>

        </div>
    </div>

    <script>

        $(function() {
            $.ajax({
                url: "<?php echo url('position/getPosition'); ?>",
                success: function (data) {
                    //alert(JSON.stringify(data));

                    var temp = JSON.parse(data);

//                    alert(temp.errcode);
//                    alert(temp.data[0]['id']);
//                    alert(temp.data[0]['position']);

                    var str = "<option value='0'>请选择</option>";
                    for(var i in temp.data) {
                        str += "<option value='" + temp.data[i]['id'] + "'>" + temp.data[i]['position'] + "</option>";
                    }
                    $("#position").html(str);


                    //Demo
                    layui.use('form', function(){
                        var form = layui.form;

                        //监听提交
                        form.on('submit(formDemo)', function(data){
//                layer.msg(JSON.stringify(data.field));
//                return false;
                        });
                    });
                }

            })
        })
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