<?php

class Domain_Time {

    public function gettime() {

        // 版本1：简单的获取
        $model = new Model_Time();
        $rs = $model->gettimeid();

        return $rs;
    }

}
