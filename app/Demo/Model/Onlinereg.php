<?php

class Model_Onlinereg extends PhalApi_Model_NotORM {

 public function modelInfo($name,$tel,$sexs,$ages,$card,$addre,$type,$de) {
     $data=array(
         'stu_name'=>$name,
         'stu_tel' =>$tel,
         'stu_sex' =>$sexs,
         'stu_age' =>$ages,
         'stu_idcard' =>$card,
         'stu_birthplace' =>$addre,
         'cert_level' =>$type,
         'stu_test' =>$de,
     );

     $rs = DI()->notorm->student->insert($data);
     return $rs;
 }

    protected function getTableName($id) {
        return 'student';
    }
}
