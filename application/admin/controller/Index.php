<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Base
{
    private  $campaign_model;
    private  $record_model;
    private  $account;

    public function _initialize() {
        $this->user = $this->getLoginUser();
        $this->campaign_model = model("Campaign");
        $this->record_model = model("Record");
    }

    /**
     * @return mixed
     * 后台首页
     */
    public function index()
    {
        $campaign = $this->campaign_model->with('position')->order('position_id asc,vote desc')->select();
        return $this->fetch('',[
                'campaign' => $campaign
            ]
        );
    }

    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('user', '', '');
        }
        return $this->account;
    }

}
