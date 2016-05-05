<?php

class Model_Time extends PhalApi_Model_NotORM {

    public function gettimeid()
    {
        $rs = DI()->notorm->time_table->select();
        return $rs;
    }

    protected function getTableName($id) {
        return 'time_table';
    }
}
