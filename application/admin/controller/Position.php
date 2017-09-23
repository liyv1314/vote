<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Position extends Base
{
    private  $position_model;
    public function _initialize() {
        $this->position_model = model("Position");
    }

    /**
     * @return mixed
     * 职位页面
     */
    public function index()
    {
        if(request()->isPost()) {
        $data = input('post.');
//            var_dump($data);exit;
        $this->position_model->save(['position' => $data['position']]);

    }

        $position = $this->position_model->select();
//        var_dump($position);exit;

        return $this->fetch('',[
            'position'=>$position,
        ]);
    }

    public function getPosition() {
        $position = $this->position_model->select();
        $data['errcode'] = 0;
        $data['msg'] = 'success';
        if($position){
            $data['data'] = $position;
            die(json_encode($data));
        }else{
            $data['errcode'] = 1;
            $data['msg'] = 'error';
            die(json_encode($data));
        }
    }

}
