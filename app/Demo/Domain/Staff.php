<?php

class Domain_Staff {

    public function getstaff() {

        // 版本1：简单的获取
        $model = new Model_Staff();
        $rs = $model->getstaff();

        return $rs;
    }

}
