<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status) {

    switch ($status) {
        case 0:
            $str = "<span class='label label-success radius'>待平台审核</span>";
            break;
        case 1:
            $str = "<span class='label label-success radius'>待服务方申请</span>";
            break;
        case 2:
            $str = "<span class='label label-success radius'>服务方已申请</span>";
            break;
        case 3:
            $str = "<span class='label label-success radius'>服务方已完成</span>";
            break;
        case 4:
            $str = "<span class='label label-success radius'>失效</span>";
    }
    return $str;
}

function recvStatus($status) {
    switch ($status) {
        case 0:
            $str = "<span class='label label-success radius'>已申请待确认</span>";
            break;
        case 1:
            $str = "<span class='label label-success radius'>已审核未通过</span>";
            break;
        case 2:
            $str = "<span class='label label-success radius'>已审核通过进行中</span>";
            break;
        case 3:
            $str = "<span class='label label-success radius'>已完成待审核</span>";
            break;
        case 4:
            $str = "<span class='label label-success radius'>已完成审核成功</span>";
        case 5:
            $str = "<span class='label label-success radius'>失效</span>";
    }
    return $str;
}

/**
 * @param $url
 * @param int $type 0 get  1 post
 * @param array $data
 */
function doCurl($url, $type=0, $data=[]) {
    $ch = curl_init(); // 初始化
    // 设置选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER,0);

    if($type == 1) {
        // post
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    //执行并获取内容
    $output = curl_exec($ch);
    // 释放curl句柄
    curl_close($ch);
    return $output;
}
// 商户入驻申请的文案
function bisRegister($status) {
    if($status == 1) {
        $str = "入驻申请成功";
    }elseif($status == 0) {
        $str = "待审核，审核后平台方会发送邮件通知，请关注邮件";

    }elseif($status == 2) {
        $str = "非常抱歉，您提交的材料不符合条件，请重新提交";
    }else {
        $str = "该申请已被删除";
    }
    return $str;
}

/**
 * 通用的分页样式
 * @param $obj
 */
function pagination($obj) {
    if(!$obj) {
        return '';
    }
    // 优化的方案
    $params = request()->param();
    return '<div class="cl pd-5 bg-1 bk-gray mt-20 tp5-o2o">'.$obj->appends($params)->render().'</div>';
}

function getSeCityName($path) {
    if(empty($path)) {
        return '';
    }
    if(preg_match('/,/', $path)) {
        $cityPath = explode(',', $path);
        $cityId = $cityPath[1];
    }else {
        $cityId = $path;
    }

    $city = model('City')->get($cityId);
    return $city->name;
}

function countLocation($ids) {
    if(!$ids) {
        return 1;
    }

    if(preg_match('/,/', $ids)) {
        $arr = explode(',', $ids);
        return count($arr);
    }

}