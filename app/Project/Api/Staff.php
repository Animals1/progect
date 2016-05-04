<?php
/**
 * 默认接口服务类
 * Staff接口
 * 用来显示教练信息
 * @author: yaobowen
 */


class Api_Staff extends PhalApi_Api {
	public function getRules() {
        return array(
        	'staffinfo' => DI()->config->get('app.Staff-info'),
        );
	}

	public function staffinfo()
	{
		$staff = new Domain_Staff();
		$info = $staff->getstaffinfo($this->staffid);
		$rs['code'] = 200;
		$rs['msg'] = '数据返回成功';
		$rs['info'] = $info;
		return $rs;
	}
	
}