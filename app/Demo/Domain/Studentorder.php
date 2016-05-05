<?php

class Domain_Studentorder {

    public function studentorder($userid,$coachid,$typeid,$timeid) {
       $uid=$userid;
        $cid=$coachid;
        $tid=$typeid;
        $tmid=$timeid;

        // 版本1：简单的获取
        $model = new Model_Studentorder();
        $rs = $model->orderInfo($uid,$cid,$tid,$tmid);
        return $rs;
    }

}
