<?php
/**
 * @author:hechengwei
 * @datetime:2016-4-14
 * @controllerName:行政管理(Administration)
 */
namespace Home\Controller;
use Think\Controller;
class AdministrationController extends Controller {

    /*
     * @ vehsetting
     * @ 车辆设置
     * */

        public function vehsettingadd()
        {
            $this->display("vehsettingadd");
        }
    /*
    * @ registration
    * @ 车辆登记
    * */
        public function registration()
        {
            $this->display("vehsettinglist");
        }

    /*
    * @ addveh
    * @ 新增车辆
    * */
        public function addveh()
        {
            $this->display("addveh");
        }
    /*
    * @ vehgoout
    * @ 车辆出勤
    * */
        public function vehgoout()
        {
            $this->display('vehgoout');
        }

    /*
    * @ vehservice
    * @ 车辆维修记录
    * */
        public function vehservice()
        {
            $this->display('vehservice');
        }

    /*
    * servicerecord
     * 维修记录详细
    * */
        public function servicerecord()
        {
            $this->display('servicerecord');
        }

    /*
     * servicerecordadd
     * 车辆维修添加
     * */
        public function servicerecordadd()
        {
            $this->display('servicerecordadd');
        }
    /*
    * vehreplace
     * 车辆更换
    * */
        public function vehreplace()
        {
            $this->display('vehreplace');
        }

    /*
     * vehreplaceadd
     * 车辆更换添加
     * */
        public function vehreplaceadd()
        {
            $this->display('vehreplaceadd');
        }

    /*
    * gasadd">油气添加
    * */
        public function gasadd()
        {
            $this->display('gasadd');
        }
    /*
     * gasrecord
     * 油气添加记录
     * */
        public function gasrecord()
        {
            $this->display('gasrecord');
        }

    /*
    * buscontrol 班车管理列表
    * */
        public function buscontrol()
        {
            $this->display('buscontrol');
        }


    /*
    * bussetting 班车设置
    * */
        public function bussetting()
        {
            $this->display('busseting');
        }

    /*
    * stureg 学员报名
    * */
        public function stureg()
        {
            $this->display('stureg');
        }

    /*
    * stuinschool 在校学员
    * */
        public function stuinschool()
        {
            $this->display('stuinschool');
        }

    /*
    * regstu">入学登记
    * */
        public function regstu()
        {
            $this->display('regstu');
        }

    /*
    * suitcontrol 投诉管理
    * */
        public function suitcontrol()
        {
            $this->display('suitcontrol');
        }

    /*
    * trainmsg 教练信息
    * */
        public function trainmsg()
        {
            $this->display('trainmsg');
        }

    /*
    * traingroup 教练分组
    * */
        public function traingroup()
        {
            $this->display('traingroup');
        }

    /*
   * traingroup 教练分组添加
   * */
        public function traingroupadd()
        {
            $this->display('traingroupadd');
        }

    /*
    * teachtime 教练学时
    * */
        public function teachtime()
        {
            $this->display('teachtime');
        }

    /*
    * trainclass">教练排课
    * */

        public function trainclass()
        {
            $this->display('trainclass');
        }





}