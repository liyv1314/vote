<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller {

    public function index() {

        if(request()->isPost()) {
            $data = input('post.');
            if($data['account'] == 'admin' && $data['password'] == 'admin') {
                session('status',true,'');
                $this->redirect('index/index');
            }
        }

        return $this->fetch();
    }

    public function logout() {
        session('status',false,'');
        $this->redirect('login/index');
    }

}