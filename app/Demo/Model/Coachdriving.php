<?php

class Model_Coachdriving extends PhalApi_Model_NotORM {

    public function getcoachdriving()
    {
        $rs = DI()->notorm->coach_driving->select();
        return $rs;
    }

    protected function getTableName($id) {
        return 'coach_driving';
    }
}
