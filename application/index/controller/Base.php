<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{

    public $account = '';

    public function _initialize() {
        $this->assign('user', $this->getLoginUser());
    }


    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('user', '', '');
        }
        return $this->account;
    }

}
