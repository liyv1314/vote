<?php
namespace app\common\model;

use think\Model;

/**
 * Class Mission
 * @package app\common\model
 * 职位模型
 */
class User extends BaseModel
{
    /**
     * 根据sid获取用户信息
     * @param $sid
     */
    public function getUserBySid($sid) {
        if(!$sid) {
            exception('学号不合法');
        }

        $data = ['sid' => $sid];
        return $this->where($data)->find();
    }

    public function record() {
        return $this->belongsTo('Record');return $this->belongsTo('Record');
    }
}
