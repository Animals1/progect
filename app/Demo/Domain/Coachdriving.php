<?php

class Domain_Coachdriving {

    public function getdrivinglevel() {

        // 版本1：简单的获取
        $model = new Model_Coachdriving();
        $rs = $model->getcoachdriving();

        return $rs;
    }

}
