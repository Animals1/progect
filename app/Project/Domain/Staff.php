<?php

class Domain_Staff {

    public function getstaffinfo($id) {
        
        $staff = new Model_Staff();
        $rs = $staff->getstaffinfoLeftJoin($id);
		// print_r($rs);die;
        if (!empty($rs)) {
            return $rs;
        }else{
            throw new PhalApi_Exception_BadRequest('错误ID，没有数据', 1);
        }

    }

   
}
