<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/Applications/MAMP/htdocs/yanvote/public/../application/index/view/index/index.html";i:1505814614;}*/ ?>
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
    <style>
        .swiper-container {
            width: 100%;
        }

        .swiper-container img {
            display: block;
            width: 100%;
        }
        .sfont{
            font-size: 13px;
        }


    </style>
</head>

<body ontouchstart>

<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="__STATIC__/index/weui/images/swiper-1.jpg" /></div>
        <div class="swiper-slide"><img src="__STATIC__/index/weui/images/swiper-2.jpg" /></div>
        <div class="swiper-slide"><img src="__STATIC__/index/weui/images/swiper-3.jpg" /></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
</div>


<div class="weui-cells" style="margin-top:0;">

    <div class="weui-cell sfont" style="background-color: #00a8ec;color: #FFFFFF;">
        <div class="weui-cell__bd" style="text-align: center;width: 10%;">
            <p>ID</p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p>姓名</p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p>竞选职位</p>
        </div>
        <div class="weui-cell__bd" style="margin-left: 1em;">
            <p>票数</p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p>投票</p>
        </div>
    </div>

    <?php if(is_array($campaign) || $campaign instanceof \think\Collection): $i = 0; $__LIST__ = $campaign;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="weui-cell sfont list" >
        <div class="weui-cell__bd" style="text-align: center;">
            <p style="color: #00a8ec;font-weight: bold;">
                <?php echo $vo['id']; ?>
            </p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p><?php echo $vo['username']; ?></p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p><?php echo $vo['position']['position']; ?></p>
        </div>
        <div class="weui-cell__bd" style="margin-left: 1em;">
            <i style="color: #00a8ec;font-weight: bold;"><?php echo $vo['vote']; ?></i>
        </div>

        <div class="weui-cell__bd" style="text-align: center;">
            <p>
                <a href="javascript:;" onclick="vote(<?php echo $vo['id']; ?>,'<?php echo $vo['position_id']; ?>')" class="weui-btn weui-btn_mini weui-btn_" style="background-color: #00a8ec;">投票</a>
            </p>
        </div>
    </div>
    <div class="messige box sfont" style="display: none;padding: 1rem;padding-top: 0;">
        $vo.desc
    </div>
    <?php endforeach; endif; else: echo "" ;endif; if(is_array($campaign_disable) || $campaign_disable instanceof \think\Collection): $i = 0; $__LIST__ = $campaign_disable;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
    <div class="weui-cell sfont list" >
        <div class="weui-cell__bd" style="text-align: center;">
            <p style="color: #00a8ec;font-weight: bold;">
                <?php echo $vo2['id']; ?>
            </p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p><?php echo $vo2['username']; ?></p>
        </div>
        <div class="weui-cell__bd" style="text-align: center;">
            <p><?php echo $vo2['position']['position']; ?></p>
        </div>
        <div class="weui-cell__bd" style="margin-left: 1em;">
            <i style="color: #00a8ec;font-weight: bold;"><?php echo $vo2['vote']; ?></i>
        </div>

        <div class="weui-cell__bd" style="text-align: center;">
            <p>
                <a href="javascript:;" onclick="event.stopPropagation();" class="weui-btn weui-btn_mini weui-btn_disabled" style="background-color: #00a8ec;">投票</a>
            </p>
        </div>
    </div>
    <div class="messige box sfont" style="display: none;padding: 1rem;padding-top: 0;">
        <?php echo $vo2['desc']; ?>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

</div>


<script src="__STATIC__/index/weui/lib/jquery-2.1.4.js"></script>
<script src="__STATIC__/index/weui/lib/fastclick.js"></script>
<script src="__STATIC__/index/weui/js/jquery-weui.js"></script>
<script src="__STATIC__/index/weui/js/swiper.js"></script>
<script>
    $(function() {
//        FastClick.attach(document.body);

        $(".swiper-container").swiper({
            loop: true,
            autoplay: 3000
        });

        $(".list").click(function(){
            $(this).next(".messige").toggle(300);

        });
    });

    function vote(campaign_id, position_id) {
        event.stopPropagation();
        $.ajax({
            url:"<?php echo url('index/vote'); ?>",
            type: 'POST',
            dataType: 'json',
            data:{'campaign_id':campaign_id, 'position_id':position_id,'user_id':<?php echo $user['id']; ?>},
            success: function (data){
                //alert(JSON.stringify(data));
                if (data.errcode === '0') {
                    $.toast(data.msg);
                    setTimeout(function(){location.reload();},300);
                }else{
                    $.toast(data.msg);
                }
            }
        });
    }

</script>

</body>

</html>