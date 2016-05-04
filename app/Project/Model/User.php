<?php

class Model_User extends PhalApi_Model_NotORM {

    public function getuserinfo($id) {
        return $this->getORM()
                    ->select('*')
                    ->where('user_id', $id)
                    ->fetch();
    }

    protected function getTableName($id) {
        return 'app_user';
    }
}
