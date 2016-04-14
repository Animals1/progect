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
/*
 * @author:hechengwei
 * @date  :2016-4-13
 * @tablename:公司表
 * */
    /*
     * 查询数据
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where,$order,$limit)
    {
        return $this->where($where)->order("$order")->limit($limit)->find();
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }
}
?>
