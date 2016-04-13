<?php
namespace Home\Model;
use Think\Model;
class CompanyModel extends Model {

	/*
	 * 公司修改方法
	 * 作者：张捷
	 */
	protected $tableName='company';
	function company_update($id,$rows){

		$db=D($this->tableName);
		$upload = new \Think\Upload();   
	    $upload->maxSize   =     3145728 ;
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
	    $upload->rootPath  =      './';
	    $upload->savePath  =      './Public/Uploads/';  
	    $info   =   $upload->upload(); 
	    $img = $info['photo']['md5'].'.'.$info['photo']['ext'];
		$data['company_logo']=$img;
		$data['company_person'] = $rows['person'];
		$data['company_tel'] = $rows['person'];
		$data['company_fax'] = $rows['person'];
		$data['company_brief'] = $rows['person'];
		$data['company_desc'] = $rows['person'];
		return $db->where("id=$id")->save($data);
		
	}
}