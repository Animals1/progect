<?php

class Domain_Onlinereg {

    public function domainInfo($username,$telphone,$sex,$age,$idcard,$address,$drivingtype,$desc) {
        $name=$username;
        $tel=$telphone;
        $sexs=$sex;
        $ages=$age;
        $card=$idcard;
        $addre=$address;
        $type=$drivingtype;
        $de=$desc;

		// 版本1：简单的获取
        $model = new Model_Onlinereg();
        $rs = $model->modelInfo($name,$tel,$sexs,$ages,$card,$addre,$type,$de);
        return $rs;
    }

    public function coach()
    {
        //$rs=array();
        $model = new Model_Studentorder();
        $rs = $model->getcoach();
        return $rs;
    }
}
