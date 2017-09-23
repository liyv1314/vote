<?php
namespace app\admin\controller;
use think\Controller;
class Campaign extends Base
{

    private  $campaign_model;
    private  $record_model;
    public function _initialize() {
        $this->campaign_model = model("Campaign");
        $this->record_model = model("Record");
    }

    /**
     * @return mixed
     * 竞选人页面
     */
    public function index()
    {
        if(request()->isPost()) {
            $data = input('post.');
            //var_dump($data);exit;
            $this->campaign_model->save($data);
        }

        $campaign = $this->campaign_model->with('position')->select();

//        var_dump(json_encode($campaign));exit;

        return $this->fetch('',[
            'campaign' => $campaign
        ]);
    }

}
