<?php
namespace app\common\model;

use think\Model;

/**
 * Class Mission
 * @package app\common\model
 * 职位模型
 */
class Position extends BaseModel
{
    public function campaign()
    {
        return $this->belongsTo('Campaign');
    }
}
