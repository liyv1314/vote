<?php
namespace app\common\model;

use think\Model;

/**
 * Class Record
 * @package app\common\model
 * 职位模型
 */
class Record extends BaseModel
{
    public function campaign()
    {
        return $this->hasOne('Campaign','id','campaign_id');
    }

    public function user()
    {
        return $this->hasOne('User','id','user_id');
    }
}
