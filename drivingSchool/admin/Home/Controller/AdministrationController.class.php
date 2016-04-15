<?php
/**
 * @author:hechengwei
 * @datetime:2016-4-14
 * @controllerName:行政管理(Administration)
 */
namespace Home\Controller;
use Think\Controller;
class AdministrationController extends Controller {
    /**
     *@展示个人信息
     */
    public function index(){
        $this->display('personal_info');
    }
    /**
     *@展示请假管理
     */
    public function leave(){
        $this->display('leave');
    }
    /**
     *@展示出勤信息
     */
    public function attendance()
    {
        $this->display('attendance');
    }
}