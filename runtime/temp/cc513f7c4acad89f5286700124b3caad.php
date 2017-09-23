<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/index/index.html";i:1505817121;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/header.html";i:1505724975;s:85:"/Applications/MAMP/htdocs/yanvote/public/../application/admin/view/public/footer.html";i:1505717316;}*/ ?>
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
                <legend>学生会投票结果</legend>
            </fieldset>
            <!--<table class="layui-table" lay-data="{height:313, url:'/demo/table/user/'}">-->
            <table class="layui-table" id="vote1">
                <thead>
                <tr>
                    <th lay-data="{field:'position', width:80, sort: true}">竞选职位</th>
                    <th lay-data="{field:'username', width:80}">候选人姓名</th>
                    <th lay-data="{field:'gender', width:80, sort: true}">性别</th>
                    <th lay-data="{field:'vote', width:80, sort: true}">票数</th>
                    <th>详情</th>
                </tr>
                </thead>

                <tbody>
                <?php if(is_array($campaign) || $campaign instanceof \think\Collection): $i = 0; $__LIST__ = $campaign;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['position']['position']; ?></td>
                        <td><?php echo $vo['username']; ?></td>
                        <td><?php echo $vo['gender']; ?></td>
                        <td><?php echo $vo['vote']; ?></td>
                        <td><a style="color: -webkit-link;cursor: auto;text-decoration: underline;" href="<?php echo url('campaign/record'); ?>?campaign_id=<?php echo $vo['id']; ?>">查看记录</a></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

        </div>
    </div>


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

    layui.use('table', function(){
        var table = layui.table;

//        //转换静态表格
//        table.init('vote1', {
//            //设置高度
//            //支持所有基础参数
//        });
//
//        table.init('vote2', {
//            //设置高度
//            //支持所有基础参数
//        });
//        table.render({ //其它参数在此省略
//            elem: '#demo',
//            count: 1,
//            data: [{'id':1,'username':'李昱','gender':'男','vote':50}]//赋值数据
//            ,page: false //开启分页
//        });

    });

</script>
</body>
</html>