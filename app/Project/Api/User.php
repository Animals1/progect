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
        	'updateuser' => DI()->config->get('app.User-update'),
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
}