<?php
namespace Home\Model;
use Think\Model;
class UploadModel extends Model {
	/*
	 * 文件上传公共类
	 * 作者：张捷
	 */
	public function upload($name){

		$upload = new \Think\Upload();   
	    $upload->maxSize   =     3145728 ;
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
	    $upload->rootPath  =      './';
	    $upload->savePath  =      './Public/Uploads/';  
	    $info   =   $upload->upload(); 
	    return $img = $info[$name]['savepath'].$info[$name]['savename'];
		return $img;

	}
}