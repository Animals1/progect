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
     * 个人中心
     * */
    public function personalcore()
    {

    }
    /*
     * @ vehsetting
     * @ 车辆设置
     * */

        public function vehsettingadd()
        {
            $coach_motor=D('CoachMotor');
            //实例化教练车类型

            //如果post不是空的
           if(!empty($_POST))
           {
               $data['motor_name']=$_POST['motor_name'];
               $data['model_name']=$_POST['model_name'];
               $driving=$_POST['driving_type'];
               $data['driving_type']=implode(',',$driving);
                //调用model添加
               $add=$coach_motor->addcoachmotor($data);
               if($add)
               {
                   $this->success('操作成功','/Home/Administration/vehsettingadd');
               }
               else
               {
                   $this->error('操作失败');
               }
           }
           else
           {
               //实例化驾照等级表
               $coach_driving=D('CoachDriving');
                //查询驾照等级
               $driving_type=$coach_driving->getValue();
                //发送驾照等级
               $this->assign('driving_type',$driving_type);
               //实例化准教类型表
               $coach_model=D('CoachModel');
                //查询准教类型
               $model_val=$coach_model->getValue();
                //查询教练车类型
               $motor_val=$coach_motor->getValue();
                //发送准教类型
               $this->assign('coach_motor',$motor_val);
                //发送教练车类型
               $this->assign('coach_model',$model_val);
                //显示模版
               $this->display("vehsettingadd");
           }

        }
        /*删除车辆设置*/
        public function delvehsetting()
        {

            $coach_motor=D('CoachMotor');
            if(!empty($_GET))
            {
                $id=$_GET['id'];
                $where="motor_id=$id";
                $del=$coach_motor->delValue($where);
                if($del)
                {
                    $this->redirect('/Home/Administration/vehsettingadd');
                }
                else
                {
                    $this->redirect('/Home/Administration/vehsettingadd');
                }
            }
        }
    /*
    * @ registration
    * @ 车辆登记
    * */
        public function registration()
        {
            //实例化车辆登记表
            $car=D('Car');
            $car_model=$car->getValues();
            //实例化驾照表
            $coach_driving=D('CoachDriving');
            $driving=$coach_driving->getValue();
            //实例化教练车类型表
            $coach_motor=D('CoachMotor');
            //查询教练车类型
            $motor_val=$coach_motor->getValue();
            //实例化车辆状态表
            $coach_status=D('CarStatus');
            //查询车辆状态
            $status=$coach_status->show();
            //车辆登记表
            $veh=D('Vehicles');
            $vehicles=$veh->getValues();

            $this->assign('car',$vehicles);
            //驾照表
            $this->assign('driving',$driving);
            //教练车类型
            $this->assign('motor',$motor_val);
            //状态
            $this->assign('status',$status);
            $this->display("vehsettinglist");
        }

    /*
     * 车辆登记删除
     * */
        public function registrationdel()
        {
            //接收id
            $id=$_GET['id'];
            //删除条件
            $where=array('car_id'=>array('in',$id));
            $car=D('Car');
            $del=$car->delCar($where);
            if($del)
            {
                $car=D('Car');
                $car_model=$car->getValues();
                //实例化驾照表
                $coach_driving=D('CoachDriving');
                $driving=$coach_driving->getValue();
                //实例化教练车类型表
                $coach_motor=D('CoachMotor');
                //查询教练车类型
                $motor_val=$coach_motor->getValue();
                //实例化车辆状态表
                $coach_status=D('CarStatus');
                //查询车辆状态
                $status=$coach_status->show();
                //车辆登记表
                $this->assign('car',$car_model);
                //驾照表
                $this->assign('driving',$driving);
                //教练车类型
                $this->assign('motor',$motor_val);
                //状态
                $this->assign('status',$status);
                $this->display("vehsettinglist");
            }
            else
            {
                $car=D('Car');
                $car_model=$car->getValues();
                //实例化驾照表
                $coach_driving=D('CoachDriving');
                $driving=$coach_driving->getValue();
                //实例化教练车类型表
                $coach_motor=D('CoachMotor');
                //查询教练车类型
                $motor_val=$coach_motor->getValue();
                //实例化车辆状态表
                $coach_status=D('CarStatus');
                //查询车辆状态
                $status=$coach_status->show();
                //车辆登记表
                $this->assign('car',$car_model);
                //驾照表
                $this->assign('driving',$driving);
                //教练车类型
                $this->assign('motor',$motor_val);
                //状态
                $this->assign('status',$status);
                $this->display("vehsettinglist");
            }
        }

    /*
    * @ addveh
    * @ 新增车辆
    * */
        public function addveh()
        {
            $car=D('Vehicles');
            if(!empty($_POST))
            {
                $data['veh_number']=$_POST['veh_number'];
                $data['license_number']=$_POST['license_number'];
                $data['driving_id']=$_POST['driving_id'];
                $data['motor_id']=$_POST['motor_id'];
                $data['car_status']=$_POST['car_status'];
                $data['car_validity']=strtotime($_POST['car_validity']);
                $type_id=implode(',',$_POST['type_id']);
                $data['type_id']=$type_id;
                $data['car_register']=time();
                $data['out_id']=$_POST['car_status'];
                $add=$car->addCar($data);
                if($add)
                {
                    $this->success('新增车辆成功','/Home/Administration/registration');
                }
                else
                {
                    $this->error('新增车辆失败');
                }
            }
            else
            {
                //实例化车辆表

                //调用方法查询驾照等级
                $driving=$car->carModel();
                //教练车类型
                $motor=$car->carMotor();
                //状态
                $status=$car->carStatus();
                //可预约类型
                $type=$car->carType();
                //驾照表
                $this->assign('driving',$driving);
                //教练车类型
                $this->assign('motor',$motor);
                //状态
                $this->assign('status',$status);
                //可预约类型
                $this->assign('type',$type);
                $this->display("addveh");
            }

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