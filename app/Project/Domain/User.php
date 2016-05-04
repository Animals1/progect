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

    public function useruodate($data)
    {
        $user = new Model_User();
        $rs = $user->useruodate($data);
        if ($rs === false) {
            throw new PhalApi_Exception_BadRequest('更新失败！有可能是相同的数据！', 1);
        }
        if ($rs == '0') {
            throw new PhalApi_Exception_BadRequest('已结更新过了，请勿重复操作！', 1);
        }
        return $rs;
    }
}
