<?php

class Model_Staff extends PhalApi_Model_NotORM {

    public function getstaff()
    {
        $sql="select staff_id,staff_name from staff left join coach on staff.staff_id=coach.coach_staff_id";
        $rs = DI()->notorm->staff->queryall($sql);
        return $rs;
    }

    protected function getTableName($id) {
        return 'staff';
    }
}
