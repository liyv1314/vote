<?php
namespace app\index\controller;
use think\Controller;
use think\captcha;

class User extends Controller
{
    public function login()
    {
        $user = session('user','', '');
        if($user && $user->id) {
           $this->redirect(url('index/index'));
        }
        return $this->fetch();

    }


    public function logincheck() {
        //判定
        if(!request()->isPost()) {
           $this->error('提交不合法');
        }
        $data = input('post.');
        //严格检验 tp5 validate

        $res['status'] = 0;
        $res['info'] = '登陆成功';
        $res['url'] = url('index/index');

        try {
            $user = model('User')->getUserBySid($data['sid']);
        }catch (\Exception $e){
            //$this->error($e->getMessage());
            $res['status'] = 1;
            $res['info'] = '未知错误';
        }

//        var_dump($user);exit;

        if(!$user) {
            //$this->error('学号不存在');
            $res['status'] = 1;
            $res['info'] = '学号不存在';
        }
        // 判定姓名是否合理
        if($data['username'] != $user->username) {
            //$this->error('姓名不正确');
            $res['status'] = 1;
            $res['info'] = '姓名不正确';
        }

        //把用户信息记录到session
        session('user', $user, '');
//        $this->success('登录成功', url('index/index'));
        die(json_encode($res));

    }

    public function logout() {
        session('user', null, '');
        $this->redirect(url('user/login'));
    }
}
