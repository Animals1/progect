<?php

class Api_Onlinereg extends PhalApi_Api {

    public function getRules() {
        return array(
            'insertinto' => array(
                'username' => array('name' => 'username', 'type' => 'string','require'=>true, 'min' => 1,  'desc' => '用户名称'),
                'telphone'      => array('name' => 'telphone', 'type' => 'string','require'=>true, 'max' => 11, 'desc' => '联系电话'),
                'sex'      => array('name' => 'sex' ,'type' =>'int', 'max' => 2,'require'=>true, 'desc' => '性别'),
                'age'      => array('name' => 'age' ,'type' =>'int','require'=>true,'min'=>18,'max'=>80, 'desc' => '年龄'),
                'idcard'   => array('name' => 'idcard' ,'type' =>'string','max'=>18 ,'require'=>true, 'desc' => '身份证号'),
                'address'  => array('name' => 'address' ,'type' =>'string', 'require'=>true,'desc' => '家庭住址'),
                'drivingtype'     => array('name' => 'drivingtype','type' => 'string' ,'require'=>true, 'desc' => '驾照类型'),
                'desc'     => array('name' => 'desc','type'=>'string','desc' => '备注'),
            ),
            'insertorder' => array(
                'userid' => array('name' =>'userid','type' =>'int', 'require' =>true,'desc' =>'用户id'),
                'coachid'=> array('name' =>'coachid','type' =>'int','require' =>true,'desc' =>'教练id'),
                'typeid' => array('name' =>'typeid','type' =>'int','require' =>true,'desc' =>'驾照等级id'),
                'timeid' => array('name' =>'timeid','type'=>'int','require' =>true,'desc' =>'时间短id'),
            )
        );
    }
///http://www.phaiapi.com/Public/?service=Onlinereg.insert&username=hechengwei&telphone=18032670023&sex=1&age=23&idcard=130106199306230911&address=%E6%B2%B3%E5%8C%97%E7%9C%81%E7%9F%B3%E5%AE%B6%E5%BA%84%E5%B8%82&drivingtype=C1&desc=hahaha
    /*
     * 在线报名
     * */
        public function insertinto()
        {

            $rs = array('code' => 0, 'msg' => '', 'info' => array());
            $domain = new Domain_Onlinereg();
            $info = $domain->domainInfo($this->username,$this->telphone,$this->sex,$this->age,$this->idcard,$this->address,$this->drivingtype,$this->desc);

            if (empty($info)) {
                DI()->logger->debug('user not found', $this->username);

                $rs['code'] = 400;
                $rs['msg'] = T('报名失败');
                return $rs;
            }
            $rs['code']=200;
            $rs['msg']="报名成功";
            $rs['info'] = $info;

            return $rs;
        }
/*
 * 教练信息
 * */
    public function staff()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        $domain = new Domain_Staff();
        $info = $domain->getstaff();

        if (empty($info)) {
            DI()->logger->debug('user not found', $this->username);

            $rs['code'] = 400;
            $rs['msg'] = T('教练获取失败');
            return $rs;
        }
        $rs['code']=200;
        $rs['msg']="教练获取成功";
        $rs['info'] = $info;

        return $rs;
    }
/*
 * 预约
 * */
    public function insertorder()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        $order = new Domain_Studentorder();
        $info = $order->studentorder($this->userid,$this->coachid,$this->typeid,$this->timeid);

        if (empty($info)) {
            DI()->logger->debug('user not found', $this->username);

            $rs['code'] = 400;
            $rs['msg'] = T('报名失败');
            return $rs;
        }
        $rs['code']=200;
        $rs['msg']="预约成功";
        $rs['info'] = $info;

        return $rs;
    }

    /*
     * 驾照等级
     * */
        public function certlevel()
        {
            $rs = array('code' => 0, 'msg' => '', 'info' => array());
            $domain = new Domain_Coachdriving();
            $info = $domain->getdrivinglevel();

            if (empty($info)) {
                DI()->logger->debug('user not found', $this->username);

                $rs['code'] = 400;
                $rs['msg'] = T('教练获取失败');
                return $rs;
            }
            $rs['code']=200;
            $rs['msg']="教练获取成功";
            $rs['info'] = $info;

            return $rs;
        }



    /*
     * 时间段
     * */

        public function gettime()
        {
            $rs = array('code' => 0, 'msg' => '', 'info' => array());
            $domain = new Domain_Time();
            $info = $domain->gettime();

            if (empty($info)) {
                DI()->logger->debug('user not found', $this->username);

                $rs['code'] = 400;
                $rs['msg'] = T('教练获取失败');
                return $rs;
            }
            $rs['code']=200;
            $rs['msg']="教练获取成功";
            $rs['info'] = $info;

            return $rs;
        }

    /**
     * 获取用户基本信息
     * @desc 用于获取单个用户基本信息
     * @return int code 操作码，0表示成功， 1表示用户不存在
     * @return object info 用户信息对象
     * @return int info.id 用户ID
     * @return string info.name 用户名字
     * @return string info.note 用户来源
     * @return string msg 提示信息
     */
    public function getBaseInfo() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new Domain_User();
        $info = $domain->getBaseInfo($this->userId);

        if (empty($info)) {
            DI()->logger->debug('user not found', $this->userId);

            $rs['code'] = 1;
            $rs['msg'] = T('user not exists');
            return $rs;
        }

        $rs['info'] = $info;

        return $rs;
    }

    /**
     * 批量获取用户基本信息
     * @desc 用于获取多个用户基本信息
     * @return int code 操作码，0表示成功
     * @return array list 用户列表
     * @return int list[].id 用户ID
     * @return string list[].name 用户名字
     * @return string list[].note 用户来源
     * @return string msg 提示信息
     */
    public function getMultiBaseInfo() {
        $rs = array('code' => 0, 'msg' => '', 'list' => array());

        $domain = new Domain_User();
        foreach ($this->userIds as $userId) {
            $rs['list'][] = $domain->getBaseInfo($userId);
        }

        return $rs;
    }
}
