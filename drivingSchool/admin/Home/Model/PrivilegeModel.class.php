<?php
namespace Home\Model;
use Think\Model;
class PrivilegeModel extends Model{
	/*
	*	@BY 郭旭峰
	*	@用户管理-账号管理
	*	查询权限-角色表
	*/
	public function rolejurisdiction(){
		return $this->Table("privilege")->join('role_privilege ON privilege.privilege_id = role_privilege.privilege_id')->join('role ON role_privilege.role_id = role.role_id')->select();
	}
}
?>