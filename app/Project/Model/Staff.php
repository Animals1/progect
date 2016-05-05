<?php

class Model_Staff extends PhalApi_Model_NotORM {

    protected function getTableName($id) {
        return 'staff';
    }

    public function getstaffinfoLeftJoin($id) {
        /* return DI()->notorm->staff
					->select('*')
                    ->where('staff_id', $id)
                    ->fetch(); */
		$sql = "select * from staff left join role on staff.role_id = role.role_id where staff_id=".$id;
		return $rs = DI()->notorm->staff->queryAll($sql);
    }

   


}
