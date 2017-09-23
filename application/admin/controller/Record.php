<?php
namespace app\admin\controller;
use think\Controller;
class Record extends Base
{

    private  $record_model;
    public function _initialize() {
        $this->record_model = model("Record");
    }

    /**
     * @return mixed
     * 投票记录
     */

    public function index() {

        $data = input('get.');

        if(isset($data['campaign_id'])) {
            $record = $this->record_model->with('user,campaign')->where('campaign_id', $data['campaign_id'])->paginate(10);
        } else {
            $record = $this->record_model->with('user,campaign')->paginate(10);
        }

        $page = $record->render();

//        $record = $this->record_model->with('user,campaign')->select();

        return $this->fetch('',[
            'record' => $record,
            'page' => $page
        ]);
    }

}
