<?php

class Model_Studentorder extends PhalApi_Model_NotORM {

   public function orderInfo($uid,$cid,$tid,$tmid)
   {
       $data=array(
           'stu_id'=>$uid,
           'coach_id' =>$cid,
           'class_id' =>$tid,
           'time_id' =>$tmid,
           'add_time'=>time(),
           'stu_order_status'=>1,
       );

       $rs = DI()->notorm->stu_order->insert($data);
       return $rs;
   }

    protected function getTableName($id) {
        return 'stu_order';
    }
}
