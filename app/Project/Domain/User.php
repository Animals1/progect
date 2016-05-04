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
}
