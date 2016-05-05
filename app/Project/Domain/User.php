<?php

class Domain_User {

    public function getuserinfo($id) {
        
        $user = new Model_User();
        $rs = $user->getuserinfo($id);
        if (!empty($rs)) {
            return $rs;
        }else{
            throw new PhalApi_Exception_BadRequest('错误ID，没有数据', 1);
        }

    }

    public function userupdate($data)
    {
        $user = new Model_User();
        $rs = $user->userupdate($data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('更新失败！有可能是相同的数据！', 1);
        }
        if ($rs == '0') {
            throw new PhalApi_Exception_BadRequest('已结更新过了，请勿重复操作！', 1);
        }
        return $rs;
    }



	/*
    *   轮播图
	*	by 郭旭峰
    */
    public function getLunbo(){

        $rs = array();

        //获取
        $model = new Model_User();
        $rs = $model->getLunbo();

        return $rs;
        
    }


    /*
    *   公司简介  
	*	by 郭旭峰
    */
    public function getCompanyabout($cId){
        $rs = array();

        $userId = intval($cId);
        if ($cId <= 0) {
            return $rs;
        }

        //版本:1：简单的获取
        $model = new Model_User();
        $rs = $model->getCompanyabout($cId);

        return $rs;
    }


    /*
    *   底部菜单
	*	by 郭旭峰
    */
    public function getAppfooter(){
        $rs = array();
        $model = new Model_User();
        $rs = $model->getAppfooter();
        return $rs;
    }

	
}
