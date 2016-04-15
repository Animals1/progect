<?php
/*
 * @author:hanqiming
 * @date  :2016-4-14
 * @tablename:欠费明细表
 * */
namespace Home\Model;
use Think\Model;
class ArrearsModel extends Model {

    /*
     * 查询数据 欠费明细表、学员信息表、费用类型表、支付方式表，四表联查；
     *
     * */
    public function getvalue()
    {
        $User = M('arrears'); // 实例化User对象
        isset($_GET['p'])?$p=$_GET['p']:$p=1;
        $list = $User->join('student on arrears.stu_id=student.stu_id')->join('money_type on arrears.money_type_id=money_type.money_type_id')->join('status on arrears.status_id=status.status_id')->where('arrears_id>0')->order('arrears_id desc')-> page($p.',3')->select();
        $count      = $User->where('arrears_id>0')->count();
        $page       = new \Think\Page($count,3);
        $show       = $page->show();
        $data = array($list,$count,$show);
        return $data;
    }
}