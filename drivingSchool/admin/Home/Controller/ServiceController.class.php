<?php
	/**
	*	@��������----����
	*	author��yaobowen
	*/
namespace Home\Controller;
use Think\Controller;
class ServiceController extends Controller {
	/**
	*	��ѯ��ǰ����ά�޼�¼��ȫ����Ϣ��
	*/
	public function getrepaircar(){
		$name = "����";
		$model = D('CarReplace');
		$arr = $model->getValue($name);
		print_r($arr);die;
		
	}
	/**
	*	ɾ��һ������
	*/
	public function delrepaircar(){
		$id = '1';
		$where = "";
		$model = D('CarReplace');
		$arr = $model->delValue($where);
		print_r($arr);die;
		
	}
	/**
	*	���һ��ά�޼�¼
	*/
	public function addrepaircar(){
		$arr = $_POST;
		$data = array();
		$model = D('CarReplace');
		$res = $model->addValue($data);
		print_r($res);die;
	}
	
    public function oil(){
    	echo "oil";die;
        }      
    public function repair(){
		echo "repair";die;
        }
      
      

}