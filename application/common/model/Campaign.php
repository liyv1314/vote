<?php
namespace app\common\model;

use think\Model;

/**
 * Class Mission
 * @package app\common\model
 * 职位模型
 */
class Campaign extends BaseModel
{
    public function position()
    {
        return $this->hasOne('Position','id','position_id');
    }

    public function record()
    {
        return $this->belongsTo('Record');
    }
}
