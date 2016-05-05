<?php

class Model_User extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'app_user';
    }

    public function getuserinfo($id) {
        return $this->getORM()
                    ->select('*')
                    ->where('user_id', $id)
                    ->fetch();
    }

    public function userupdate($data)
    {
        $id = $data->userid;
        $arr = array(
            'user_nickname' => $data->usernickname,
            'user_tel' => $data->usertel,
            'user_sex' => $data->usersex,
            'user_area' => $data->userarea,
        );
        return $this->getORM()->where('user_id',$id)->update($arr);
    }




	/*
    *   轮播图
	*	by 郭旭峰
    */
    public function getLunbo(){
        $sql = "select * from lunbo";
        
        $rs = DI()->notorm->lunbo->queryAll($sql);
        return $rs;
    }


    /*
    *   公司简介
	*	by 郭旭峰
    */
    public function getCompanyabout($cId){
        $sql = "select * from company where company_id = :id";
        $params = array(
            ":id" => $cId
        );

        $rs = DI()->notorm->company->queryAll($sql,$params);
        return $rs;
    }


    /*
    *   底部菜单
	*    by 郭旭峰
    */
    public function getAppfooter(){
        $sql = "select * from appfooter";
        $rs = DI()->notorm->appfooter->queryAll($sql);
        return $rs;
    }


}
