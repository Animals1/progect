<?php
/**
 * 默认接口服务类
 * User接口
 * 用来显示个人信息
 * @author: 张捷
 */


class Api_User extends PhalApi_Api {
	public function getRules() {
        return array(
        	'userinfo' => DI()->config->get('app.User-info'),
        	'userupdate' => DI()->config->get('app.User-update'),
        );
	}

	public function userinfo()
	{
		$user = new Domain_User();
		$info = $user->getuserinfo($this->userid);
		$rs['code'] = 1;
		$rs['msg'] = '数据返回成功';
		$rs['info'] = $info;
		return $rs;
	}
	public function userupdate()
	{
		$user = new Domain_User();
		$info = $user->userupdate($this);
		$rs['code'] = 1;
		$rs['msg'] = '数据更新成功';
		$rs['info'] = $info;
		return $rs;
	}




	/**
     * 获取轮播图信息
     * @return int code 操作码，0表示成功，1表示没有获取到信息
     * @return object info 轮播图信息对象
     * @return int info.id 图片ID
     * @return string info.name 图片名字
     * @return string info.note 图片来源
     * @return string msg 提示信息
	 *	by  郭旭峰
     */
    public function getLunbo(){
        $rs = array('code'=>0,'msg'=>'','list'=>array());

        $domain = new Domain_User();
        $info = $domain->getLunbo();//全部查询

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
     * 获取公司基本信息
     * @return int code 操作码，0表示成功，1表示没有获取到信息
     * @return object info 公司简介信息对象
     * @return string msg 提示信息
	 * by  郭旭峰
     */

    public function getCompanyabout(){
        $rs = array('code'=>0,'msg'=>'','list'=>array());

        $domain = new Domain_User();
        $info = $domain->getCompanyabout($this->cId);//根据id查询

        if (empty($info)) {
            DI()->logger->debug('user not found', $this->cId);

            $rs['code'] = 1;
            $rs['msg'] = T('user not exists');
            return $rs;
        }

        $rs['info'] = $info;

        return $rs;

    }



    /**
     * 获取底部菜单信息
     * @return int code 操作码，0表示成功，1表示没有获取到信息
     * @return object info 底部信息对象
     * @return string msg 提示信息
	 *	by 郭旭峰
     */
    public function getAppfooter(){
        $rs = array('code'=>0,'msg'=>'','list'=>array());
        $domain = new Domain_User();
        $info = $domain->getAppfooter();
        if (empty($info)) {
            DI()->logger->debug('user not found', $this->cId);

            $rs['code'] = 1;
            $rs['msg'] = T('user not exists');
            return $rs;
        }

        $rs['info'] = $info;

        return $rs;
    }
	

}