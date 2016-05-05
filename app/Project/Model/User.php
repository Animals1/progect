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


}
