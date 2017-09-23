<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends Base
{
    private  $campaign_model;
    private  $record_model;
    public $user;

    public function _initialize() {
        $this->user = $this->getLoginUser();
        $this->campaign_model = model("Campaign");
        $this->record_model = model("Record");
    }

    public function index()
    {
//        var_dump($this->account);exit;

        $user = Db::table('user')->find($this->user->id);

        $campaign = $this->campaign_model->with('position')->where('position_id','not in',$user['choosed'])->order('position_id asc,vote desc')->select();
        $campaign_disable = $this->campaign_model->with('position')->where('position_id','in',$user['choosed'])->order('position_id asc,vote desc')->select();
        $this->assign('user', $user);

//        var_dump($campaign_disable);exit;

        return $this->fetch('',[
            'campaign' => $campaign,
            'campaign_disable' => $campaign_disable
        ]);
    }

    public function vote() {
        $user = Db::table('user')->find($this->user->id);
        if(request()->isPost()) {
            $data = input('post.');
            //var_dump($data);exit;

            $res['errcode'] = '0';
            $res['msg'] = '投票成功';
            if($user['choosed'] != '') {
                $where = explode(',', $user['choosed']);
            }
            $where[] = $data['position_id'];
            unset($data['position_id']);
            $where = implode(',',$where);

            Db::startTrans();
            try{
                Db::table('record')->insert($data);
                Db::table('user')->update(['choosed'=>$where,'id'=>$user['id']]);
                Db::table('campaign')->where('id',$data['campaign_id'])->setInc('vote');;
                // 提交事务
                Db::commit();
            } catch (\Exception $e) {
                // 回滚事务

                $res['errcode'] = '1';
                $res['msg'] = $e->getMessage();
                Db::rollback();
            }

            die(json_encode($res));
        }
    }

    public function getLoginUser() {
        if(!$this->account) {
            $this->account = session('user', '', '');
        }
        return $this->account;
    }
}
