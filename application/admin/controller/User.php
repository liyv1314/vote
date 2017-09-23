<?php
namespace app\admin\controller;
use think\Controller;
class User extends Base
{

    private  $user_model;
    public function _initialize() {
        $this->user_model = model("User");
    }

    /**
     * @return mixed
     * 投票记录页面
     */
    public function index()
    {

        if(request()->isPost()) {
            $data = input('post.');
            //var_dump($data);exit;
            $this->user_model->save($data);
        }

        $user = $this->user_model->select();

//        var_dump(json_encode($user));exit;

        return $this->fetch('',[
            'user' => $user
        ]);
    }

}
