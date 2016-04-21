<?php
/*
 *@author:xueyunhuan
 *@date  :2016-4-13
 *@tablename:时刻表
 * */
namespace Home\Model;
use Think\Model;
class TimeTableModel extends Model {
    public function getvalue(){
    	return $this->select();
    }
}
?>