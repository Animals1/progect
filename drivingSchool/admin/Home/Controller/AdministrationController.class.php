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
                $where="coach_motor.motor_id=$id";
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
            //分页
            $vehicles=$veh->getvalue();
           // print_r($vehicles);die;
            //分页
            $p = $vehicles['0'];
            $list = $vehicles['1'];
            $page = $vehicles['2'];
            $count = $vehicles['3'];

            $this->assign('car',$list);
//print_r($list);die;
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
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
            $where=array('veh_id'=>array('in',$id));
            $veh=D('Vehicles');
            $del=$veh->delCar($where);
            if($del)
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
                //分页
                $vehicles=$veh->getvalue();
                // print_r($vehicles);die;
                //分页
                $p = $vehicles['0'];
                $list = $vehicles['1'];
                $page = $vehicles['2'];
                $count = $vehicles['3'];

                $this->assign('car',$list);
//print_r($list);die;
                $this->assign('count',$count);
                $this->assign('page',$page);
                $this->assign('p',$p);
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
                //分页
                $vehicles=$veh->getvalue();
                // print_r($vehicles);die;
                //分页
                $p = $vehicles['0'];
                $list = $vehicles['1'];
                $page = $vehicles['2'];
                $count = $vehicles['3'];

                $this->assign('car',$list);
//print_r($list);die;
                $this->assign('count',$count);
                $this->assign('page',$page);
                $this->assign('p',$p);
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
     * 车辆登记搜索
     * 多条件搜索,拼接条件
     * */
        public function registrationsearch()
        {
            $coach_driving=$_GET['coach_driving'];
            $coach_motor=$_GET['coach_motor'];
            $car_status=$_GET['car_status'];
            $car_number=$_GET['car_number'];
            $license_number=$_GET['license_number'];
            $where=1;
            if($coach_driving != null && $coach_driving != -1)
            {
                $where.=" and vehicles.driving_id='$coach_driving'";
            }
            if($coach_motor != null && $coach_motor != -1)
            {
                $where.=" and vehicles.motor_id='$coach_motor'";
            }
            if($car_status != null && $car_status != -1)
            {
                $where.=" and vehicles.car_status='$car_status'";
            }
            if($car_number != null)
            {
                $where.=" and vehicles.veh_number like '%$car_number%'";
            }
            if($license_number != null)
            {
                $where.=" and vehicles.license_number like '%$license_number%'";
            }
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
            //分页
            $vehicles=$veh->getvalue($where);
            // print_r($vehicles);die;
            //分页
            $p = $vehicles['0'];
            $list = $vehicles['1'];
            $page = $vehicles['2'];
            $count = $vehicles['3'];

            $this->assign('car',$list);
//print_r($list);die;
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            //驾照表
            $this->assign('driving',$driving);
            //教练车类型
            $this->assign('motor',$motor_val);
            //状态
            $this->assign('status',$status);
            $this->display("vehsettinglist");
        }

    /*
    * @ addveh
    * @ 新增车辆
     * 如果有post值添加,否则就是列表
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
     * 车辆分配
     * */
        public function carassignment()
        {
            $coach=D('Coach');
            if($_POST)
            {
                $car_id=$_POST['car_id'];
                $coach_id=$_POST['coach_id'];
                $where="coach_id='$coach_id'";
                $data['car_id']=$car_id;
                $msg=$coach->updatecar($where,$data);
                if($msg)
                {
                    $this->success('车辆分配成功','/Home/Administration/addveh');
                }
                else
                {
                    $this->error('车辆分配失败');
                }
            }
            else
            {
                //查询所有车辆
                $car=D('Car');
                $car_number=$car->vehicles();
                //查询所有没有分配车辆的教练

                $where="coach.car_id='0'";
                $coach_name=$coach->coachMessage($where);
                $list=$coach_name[1];
                $this->assign('coach',$list);
                $this->assign('car',$car_number);
                $this->display('carassignment');
            }
        }
    /*
    * @ vehgoout
    * @ 车辆出勤
    * */
        public function vehgoout()
        {
            $car=D('Car');
            $where=" car_status.status_id='2' or car_status.status_id='5'";
            $goout=$car->getGoout($where);
            $time=$car->timetable();
            //驾照
            $driving=$car->coachDriving();
            //教练车类型
            $motor=$car->coachMotor();
            //状态
            $status=$car->carStatus();
            //print_r($goout);die;
            $this->assign('goout',$goout);
            $this->assign('time',$time);
            $this->assign('driving',$driving);
            $this->assign('motor',$motor);
            $this->assign('status',$status);
            $this->display('vehgoout');
        }

    /*
     * 车辆出勤搜索
     * */
        public function vehgooutsearch()
        {
            /*接收值,拼接where条件*/
            $coach_driving=$_GET['coach_driving'];
            $coach_motor=$_GET['coach_motor'];
            $car_status=$_GET['car_status'];
            $car_number=$_GET['car_number'];
            $license_number=$_GET['license_number'];
            $where=" car_status.status_id='2' or car_status.status_id='5'";
            if($coach_driving != null && $coach_driving != -1)
            {
                $where.=" and car.driving_id='$coach_driving'";
            }
            if($coach_motor != null && $coach_motor != -1)
            {
                $where.=" and car.motor_id='$coach_motor'";
            }
            if($car_status != null && $car_status != -1)
            {
                $where.=" and car.car_status='$car_status'";
            }
            if($car_number != null)
            {
                $where.=" and car.car_number like '%$car_number%'";
            }
            if($license_number != null)
            {
                $where.=" and car.license_number like '%$license_number%'";
            }
            $car=D('Car');
            $goout=$car->getGoout($where);
            $time=$car->timetable();
            //驾照
            $driving=$car->coachDriving();
            //教练车类型
            $motor=$car->coachMotor();
            //状态
            $status=$car->carStatus();
            //print_r($goout);die;
            $this->assign('goout',$goout);
            $this->assign('time',$time);
            $this->assign('driving',$driving);
            $this->assign('motor',$motor);
            $this->assign('status',$status);
            $this->display('vehgoout');
        }

    /*
    * @ vehservice
    * @ 车辆维修记录
    * */
        public function vehservice()
        {
            //查询维修记录
            $car=D('Car');
            $repair=$car->vehrepair();
            //查询状态下拉用
            $status=D('RepairStatus');
            $repair_status=$status->getValue();
            //查询员工,下拉用
            $coach=D('Coach');
            $coachMess=$coach->coachMessage();

            $p = $repair['0'];
            $list = $repair['1'];
            $page = $repair['2'];
            $count = $repair['3'];


            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);

            $this->assign('coachMess',$coachMess);
            $this->assign('status',$repair_status);
            $this->assign('repair',$list);
            $this->display('vehservice');
        }
    /*
     * 车辆维修记录搜索
     * 字符串拼接where条件
     * */
        public function repairsearch()
        {
            /*接收值*/
            $car_number=$_GET['car_number'];
            $repair_coachname=$_GET['repair_coachname'];
            $laydate=strtotime($_GET['laydate']);
            $repair_status=$_GET['repair_status'];
            /*开始拼接条件*/
            $where=1;
            if($car_number != null && $car_number != -1)
            {
                $where.=" and car.car_number like '%$car_number%'";
            }
            if($repair_coachname != null && $repair_coachname != -1)
            {
                $where.=" and staff.staff_id='$repair_coachname'";
            }
            if($repair_status != null && $repair_status != -1)
            {
                $where.=" and car_repair.repair_statusid='$repair_status'";
            }
            if($laydate != null && $laydate != -1)
            {
                $where.=" and car_repair.repair_time='$laydate'";
            }
            /*实例化车辆登记表model,调用方法查询*/
            $car=D('Car');
            $repair=$car->vehrepair($where);
            //查询状态下拉用
            $status=D('RepairStatus');
            $repair_status=$status->getValue();
            //查询员工,下拉用
            $coach=D('Coach');
            $coachMess=$coach->coachMessage();

            $p = $repair['0'];
            $list = $repair['1'];
            $page = $repair['2'];
            $count = $repair['3'];


            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);

            $this->assign('coachMess',$coachMess);
            $this->assign('status',$repair_status);
            $this->assign('repair',$list);
            $this->display('vehservice');

        }
    /*
    * servicerecord
     * 维修记录详细
    * */
        public function servicerecord()
        {
            if($_GET)
            {
                $car_number=$_GET['id'];
                $where="car.car_number like '%$car_number%'";
                $car=D('Car');
                $repair_record=$car->vehrepair($where);
                $p = $repair_record['0'];
                $list = $repair_record['1'];
                $page = $repair_record['2'];
                $count = $repair_record['3'];


                $this->assign('count',$count);
                $this->assign('page',$page);
                $this->assign('p',$p);

                $this->assign('repair_record',$list);
                $this->display('servicerecord');
            }
            else
            {
                $car_number=$_GET['id'];
                $where="car.car_number like '%$car_number%'";
                $car=D('Car');
                $repair_record=$car->vehrepair($where);
                $p = $repair_record['0'];
                $list = $repair_record['1'];
                $page = $repair_record['2'];
                $count = $repair_record['3'];


                $this->assign('count',$count);
                $this->assign('page',$page);
                $this->assign('p',$p);

                $this->assign('repair_record',$list);
                $this->display('servicerecord');
            }

        }

    /*
     * servicerecordadd
     * 车辆维修添加
     * 如果post不是空的就添加,否则就是列表
     * */
        public function servicerecordadd()
        {
           if(!empty($_POST))
           {
                $data['repair_carid']=$_POST['repair_carid'];
                $data['repair_coachname']=$_POST['repair_coachname'];
                $data['repair_desc']=$_POST['repair_desc'];
                $data['repair_time']=time();
                $data['repair_statusid']=2;
                $repair=D('CarRepair');
               $add=$repair->addrepair($data);
               if($add)
               {
                   $this->success('添加维修记录成功','/Home/Administration/servicerecordadd');
               }
               else
               {
                   $this->error('添加维修记录失败');
               }
           }
           else
           {
                $car=D('Car');
                $vehicles=$car->vehicles();
                $coach=D('Coach');
                $coachMess=$coach->coachMessage();

                $this->assign('vehicles',$vehicles);
                $this->assign('coachMess',$coachMess);

                $this->display('servicerecordadd');
           }
        }

    /*
     * vehreplaceadd
     * 车辆更换添加
     * */
        public function vehreplaceadd()
        {
            //实例化车辆更换
            $replace=D('CarReplace');
            //实例化车辆表
            $car=D('Car');
            //实例化车辆维修

            //实例化教练表
            $coach=D('Coach');
            //有post值
            if($_POST)
            {
                //接值
                $check=$_POST['repair'];
                $data['replace_name']=$_POST['replace_name'];
                $data['replace_time']=time();
                $data['replace_number_before']=$_POST['replace_number_before'];
                $data['replace_number_after']=$_POST['replace_number_after'];
                $data['replace_reason']=$_POST['change_reason'];

                //如果点击了同时报修
                if($check=='checked')
                {
                    $repair['repair_coachname']=$data['replace_name'];
                    $repair['repair_carid']=$data['replace_number_before'];
                    $repair['repair_desc']=$data['replace_reason'];
                    $repair['repair_time']=$data['replace_time'];
                    $repair_car=D('CarRepair');
                    //报修
                    $repair_add=$repair_car->addrepair($repair);
                    //更换车辆
                    $car_replace=$replace->addCarreplace($data);
                    if($repair_add && $car_replace)
                    {
                        $this->success('更换车辆与报修成功','/Home/Administration/vehreplace');
                    }
                    else
                    {
                        $this->error('更换车辆或报修失败');
                    }
                }
                else
                {
                    //更换车辆
                    $car_replace=$replace->addCarreplace($data);
                    if($car_replace)
                    {
                        $this->success('更换车辆申请成功','/Home/Administration/vehreplace');
                    }
                    else
                    {
                        $this->error('更换车辆申请失败');
                    }
                }
            }
            else
            {
                //获取车牌号
                $car_number=$car->vehicles();

                $coachMess=$coach->coachMessage();
                $this->assign('coachMess',$coachMess);
                $this->assign('car_number',$car_number);
                $this->display('vehreplaceadd');
            }

        }
    /*
    * vehreplace
     * 车辆更换
    * */
    public function vehreplace()
    {
        $coach=D('Coach');
        $coachMess=$coach->coachMessage();
        $replace=D('CarReplace');
        $car_replace=$replace->selectReplace();
       // print_r($car_replace);die;
        $this->assign('replace',$car_replace);
        $this->assign('coachMess',$coachMess);
        $this->display('vehreplace');
    }

    /*
     * 车辆更换的搜索
     * */
        public function replacesearch()
        {
            /*接收值*/
            $car_number=$_GET['car_number'];
            $replace_name=$_GET['replace_name'];
            $laydate=strtotime($_GET['laydate']);
            /*开始拼接条件*/
            $where=1;
            if($car_number != null && $car_number != -1)
            {
                $where.=" and car.car_number like '%$car_number%'";
            }
            if($replace_name != null && $replace_name != -1)
            {
                $where.=" and staff.staff_id='$replace_name'";
            }
            if($laydate != null && $laydate != -1)
            {
                $where.=" and car_repair.repair_time='$laydate'";
            }
            $coach=D('Coach');
            $coachMess=$coach->coachMessage();
            $replace=D('CarReplace');
            $car_replace=$replace->selectReplace($where);
            $this->assign('replace',$car_replace);
            $this->assign('coachMess',$coachMess);
            $this->display('vehreplace');
        }

    /*
    * gasadd">油气添加
    * */
        public function gasadd()
        {
            if($_POST)
            {
                $data['applicant_name']=$_POST['applicant_name'];
                $data['car_number']=$_POST['car_number'];
                $data['gas_type_id']=$_POST['gas_type_id'];
                $data['gas_volume']=$_POST['gas_volume'];
                $data['gas_addtime']=time();
                $gasadd=D('GasAdd');
                $gas_add=$gasadd->addgas($data);
                if($gas_add)
                {
                    $this->success('汽油申请成功','/Home/Administration/gasrecord');
                }
                else
                {
                    $this->error('汽油申请失败','/Home/Administration/gasadd');
                }
            }
            else
            {
                $car=D('Car');
                $car_number=$car->vehicles();
                $gas=D('GasType');
                $gas_type=$gas->getValue();
                $this->assign('car_number',$car_number);
                $this->assign('gas_type',$gas_type);
                $this->display('gasadd');
            }
        }
    /*
     * gasrecord
     * 油气添加记录
     * */
        public function gasrecord()
        {
            $record=D('GasNum');
            $type=D('GasType');
            $count=$type->getValue();
            $gasadd=D('GasAdd');
            $rec=$gasadd->gasMessage();
            for($i=1;$i<=count($count);$i++)
            {
                if(1==$i)
                {
                    $where="t_id='1'";
                    $jiusan=$record->gasMessage($where);
                }
                if(2==$i)
                {
                    $where="t_id='2'";
                    $jiuqi=$record->gasMessage($where);
                }
                if(3==$i)
                {
                    $where="t_id='3'";
                    $tianran=$record->gasMessage($where);
                }

            }
           for($i=0;$i<count($jiusan);$i++)
           {
                $gas93[]=array($jiusan[$i]['m_id'],intval($jiusan[$i]['gas_num']));
           }

            for($i=0;$i<count($jiuqi);$i++)
            {
                $gas97[]=array($jiuqi[$i]['m_id'],intval($jiuqi[$i]['gas_num']));
            }

            for($i=0;$i<count($tianran);$i++)
            {
                $gas99[]=array($tianran[$i]['m_id'],intval($tianran[$i]['gas_num']));
            }

            $data93=json_encode($gas93);
            $data97=json_encode($gas97);
            $data99=json_encode($gas99);
            $this->assign('data93',$data93);
            $this->assign('data97',$data97);
            $this->assign('data99',$data99);
            $this->assign('record',$rec);
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
            $bus=D('Bus');
            if($_POST)
            {
                $data['bus_route']=$_POST['bus_route'];
                $data['car_number']=$_POST['car_number'];
                $data['bus_station']=implode('/',$_POST['bus_station']);
                $data['bus_starttime']=implode(',',$_POST['time']);
                $data['bus_endtime']=implode(',',$_POST['min']);


                $busadd=$bus->addBus($data);
                if($busadd)
                {
                    $this->success('添加路线成功','/Home/Administration/bussetting');
                }
                else
                {
                    $this->error('添加路线失败');
                }

            }
            else
            {
                $busseting=$bus->getValue();
                $p = $busseting['0'];
                $list = $busseting['1'];
                $page = $busseting['2'];
                $count = $busseting['3'];


                $this->assign('count',$count);
                $this->assign('page',$page);
                $this->assign('p',$p);
                $this->assign('busset',$list);
                $this->display('busseting');
            }
        }
    /*
     * 班车路线删除
     * */
        public function busdel()
        {
            $id=$_GET['id'];
            $bus=D('Bus');
            $where="bus_id='$id'";
            $del=$bus->delValue($where);
            if($del)
            {
                $this->success('路线删除成功','/Home/Administration/bussetting');
            }
            else
            {
                $this->error('路线删除失败');
            }
        }

    /*
    * stureg 学员报名
    * */
        public function stureg()
        {
            $stu=D('Student');
            $where="student.stu_status_id='4'";
            $student=$stu->studentinfo($where);
            /*---分页----*/
            $p = $student['0'];//分页当前页
            $list = $student['1'];//数据
            $page = $student['2'];//页码
            $count = $student['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/
            $this->assign('student',$list);
            $this->display('stureg');
        }

    /*
    * stuinschool 在校学员
    * */
        public function stuinschool()
        {
            $inschool=D('Student');
            $student_inschool=$inschool->inschoolstu();
           // print_r($student_inschool);die;
            $status=$inschool->status();
            $driving=$inschool->driving();
            /*---分页----*/
            $p = $student_inschool['0'];//分页当前页
            $list = $student_inschool['1'];//数据
            $page = $student_inschool['2'];//页码
            $count = $student_inschool['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/
            $this->assign('student',$list);
            $this->assign('status',$status);
            $this->assign('driving',$driving);
            $this->display('stuinschool');
        }
    /*
     * 在校学生搜索
     * */
        public function inschoolsearch()
        {
            /*
             *
             * */
            $stu_sn=$_GET['stu_sn'];
            $stu_name=$_GET['stu_name'];
            $stu_tel=$_GET['stu_tel'];
            $laydate=$_GET['laydate'];
            $motor_id=$_GET['motor_id'];
            $sex_id=$_GET['sex_id'];
            $stu_status_id=$_GET['stu_status_id'];
            /*开始拼接条件*/
            $where=1;
            if($stu_sn != null)
            {
                $where.=" and student.stu_sn='$stu_sn'";
            }
            if($stu_name != null)
            {
                $where.=" and student.stu_name like'%$stu_name%'";
            }
            if($stu_tel != null)
            {
                $where.=" and student.stu_tel='$stu_tel'";
            }
            if($laydate != null)
            {
                $where.=" and student.stu_time='$laydate'";
            }
            if($motor_id != null && $motor_id != 0)
            {
                $where.=" and student.cert_level='$motor_id'";
            }
            if($sex_id != null && $sex_id != 0)
            {
                $where.=" and student.stu_sex='$sex_id'";
            }
            if($stu_status_id != null && $stu_status_id != 0)
            {
                $where.=" and student.stu_status_id='$stu_status_id'";
            }
            $inschool=D('Student');
            $student_inschool=$inschool->inschoolstu($where);
            // print_r($student_inschool);die;
            $status=$inschool->status();
            $driving=$inschool->driving();
            /*---分页----*/
            $p = $student_inschool['0'];//分页当前页
            $list = $student_inschool['1'];//数据
            $page = $student_inschool['2'];//页码
            $count = $student_inschool['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/
            $this->assign('student',$list);
            $this->assign('status',$status);
            $this->assign('driving',$driving);
            $this->display('stuinschool');
        }

    /*
    * regstu">入学登记
    * */
        public function regstu()
        {
            if($_POST)
            {
                $staff=D('Staff');
                $img=$staff->upload('stu_photo');
                $data['stu_time']=$_POST['stu_time'];
                $data['stu_name']=$_POST['stu_name'];
                $data['stu_sn']=$_POST['stu_sn'];
                $data['stu_sex']=$_POST['stu_sex'];
                $data['stu_idcard']=$_POST['idcard'];
                $data['stu_tel']=$_POST['stu_tel'];
                $data['stu_email']=$_POST['stu_email'];
                $data['motor_id']=$_POST['stu_motor'];
                $data['cert_level']=$_POST['cert_level'];
                $data['stu_test']=$_POST['stu_test'];

                /*户口所在地*/
                $stu_birthplace = $_POST['stu_birthplace'];
                $stu_birthplace.= ','.$_POST['stu_birthplace1'];
                $stu_birthplace.= ','.$_POST['stu_birthplace2'];

                $stu_curaddress = $_POST['stu_curaddress'];
                $stu_curaddress.= ','.$_POST['stu_curaddress1'];
                $stu_curaddress.= ','.$_POST['stu_curaddress2'];
                $curaddress=$_POST['curaddress'];
                $area[]=$stu_birthplace;
                $area[]=$stu_curaddress;

                $stu=D('Student');
                $student=$stu->area($area);
                //print_r($student);die;
                foreach($student as $key=>$val)
                {
                    foreach($val as $k=>$v)
                    {
                        $region_name[$key][$k]=$v['region_name'];
                    }
                    //dump($region_name);
                }
                foreach($region_name as $rk=>$rv)
                {
                    $region[]=implode(',',$rv);
                }
                $data['stu_birthplace']=$region[0];
                $data['stu_currentplace']=$region[1].','.$curaddress;
                $data['stu_photo']=$img;
                /*添加*/
                $add=$stu->inschoolRecord($data);
                /*驾照进度*/
                $progress=D('Progress');
                $prog['stu_id']=$add;
                $prog['progress_isaccept']=1;
                $prog['test_one']=0;
                $prog['test_two']=0;
                $prog['test_three']=0;
                $prog['test_four']=0;
                $prog['mylicense']=0;

                $insert=$progress->addprogress($prog);
                if($insert)
                {
                    $this->success('入学登记成功','/Home/Administration/regstu');
                }
                else
                {
                    $this->error('入学登记失败','/Home/Administration/regstu');
                }

            }
            else
            {
                $staff = D('staff');
                $region = $staff->linkage();
                $motor=D('CoachMotor');
                $coach_motor=$motor->getValue();
                $driving=D('CoachDriving');
                $coach_driving=$driving->getValue();
                $this->assign('driving',$coach_driving);
                $this->assign('region',$region);
                $this->assign('motor',$coach_motor);
                $this->display('regstu');
            }
        }
    /*
     * 地区联动
     * */
        public function area(){
            $id = $_GET['id'];
            $staff = D('staff');
            $region = $staff->linkage($id);
            echo json_encode($region);
        }

    /*
    * suitcontrol 投诉管理
    * */
        public function suitcontrol()
        {
            $com=D('Complaint');
            $complaint=$com->getValue();
            $coach=$com->selectComplain();
            /*---分页----*/
            $p = $complaint['0'];//分页当前页
            $list = $complaint['1'];//数据
            $page = $complaint['2'];//页码
            $count = $complaint['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/

            $this->assign('coach',$coach);
            $this->assign('complaint',$list);
            $this->display('suitcontrol');
        }
    /*
     * 投诉搜索
     * */
        public function complaintsearch()
        {
            $val=$_GET['coach'];
            $com=D('Complaint');
            $where="staff.staff_id='$val'";
            $complaint=$com->getValue($where);
            $coach=$com->selectComplain();
            /*---分页----*/
            $p = $complaint['0'];//分页当前页
            $list = $complaint['1'];//数据
            $page = $complaint['2'];//页码
            $count = $complaint['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/

            $this->assign('coach',$coach);
            $this->assign('complaint',$list);
            $this->display('suitcontrol');
        }
    /*
    * trainmsg 教练信息
    * */
        public function trainmsg()
        {
            $coach=D('Coach');
            $coach_message=$coach->coachMessage();
            $group=$coach->groupName();
            /*---分页----*/
            $p = $coach_message['0'];//分页当前页
            $list = $coach_message['1'];//数据
            $page = $coach_message['2'];//页码
            $count = $coach_message['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/
            $this->assign('group',$group);
            $this->assign('coach',$list);
            $this->display('trainmsg');
        }
    /*
     * 教练信息搜索
     * */
        public function searchgroup()
        {
            $staff_sn=$_GET['staff_sn'];
            $staff_name=$_GET['staff_name'];
            $staff_idcard=$_GET['staff_idcard'];
            $group_id=$_GET['id'];
            $where=1;
            if($staff_sn != null)
            {
                $where.=" and staff.staff_sn='$staff_sn'";
            }
            if($staff_name != null)
            {
                $where.=" and staff.staff_name like'%$staff_name%'";
            }
            if($staff_idcard != null)
            {
                $where.=" and staff.staff_idcard='$staff_idcard'";
            }
            if($group_id != null && $group_id != -1)
            {
                $where.=" and coach.group_id='$group_id'";
            }
            $coach=D('Coach');
            $coach_message=$coach->coachMessage($where);
            $group=$coach->groupName();
            /*---分页----*/
            $p = $coach_message['0'];//分页当前页
            $list = $coach_message['1'];//数据
            $page = $coach_message['2'];//页码
            $count = $coach_message['3'];//总条数
            $this->assign('count',$count);
            $this->assign('page',$page);
            $this->assign('p',$p);
            /*---分页end----*/
            $this->assign('group',$group);
            $this->assign('coach',$list);
            $this->display('trainmsg');

        }

    /*
    * traingroup 教练分组
    * */
        public function traingroup()
        {
            $group=D('CoachGroup');
            $coach_group=$group->getValue();

            $this->assign('group',$coach_group);
            $this->display('traingroup');
        }
    /*
     * 分组删除
     * */
        public function delgroup()
        {
            $id=$_GET['id'];
            $group=D('CoachGroup');
            $where="group_id='$id'";
            $coach_group=$group->deletegroup($where);
            if($coach_group)
            {
                $this->success('分组删除成功','/Home/Administration/traingroup');
            }
            else
            {
                $this->error('分组删除失败');
            }
        }

    /*
   * traingroup 教练分组添加
   * */
        public function traingroupadd()
        {
            $coach=D('Coach');
           if($_POST)
           {
               $data['staffname']=$_POST['lander'];
               $data['group_name']=$_POST['group_name'];
               $data['parent_id']=0;
               $data['phone']=$_POST['phone'];
               $groupadd=D('CoachGroup');
               $group=$groupadd->addgroup($data);

               if($group)
               {
                   $child[]=$group;
                   $child[]=$_POST['group_child'];
                   //组员的父级id
                   $addchild=$groupadd->addchild($child);

                   if($addchild)
                   {
                       $where="parent_id='$group'";
                       $group_team=$coach->selectgroup($where);
                       $group_team[]=$data;
                       $update_coach_gropu_id=$coach->UpdateCoachGropuId($group_team);
                       if($update_coach_gropu_id)
                       {
                           $this->success('分组添加成功','/Home/Administration/traingroupadd');
                       }
                       else
                       {
                           $this->error('分组添加失败');
                       }
                   }
                   else
                   {
                       $this->error('分组添加失败');
                   }
               }

           }
            else
            {

                $where="coach.group_id=0";
                $coachMessage=$coach->nogroupcoachmessage($where);
                $this->assign('nogroup',$coachMessage);
                $this->display('traingroupadd');
            }

        }

    /*
    * teachtime 教练学时
     * A()方法调用人事的教学学时
    * */
        public function teachtime()
        {
            $salary=A('Staff');
            $data=$salary->salary();
            print_r($data);
        }

    /*
    * trainclass">教练排课
    * */

        public function trainclass()
        {
            $stu=D('StuOrder');
            $order=$stu->selectAppointment();
            foreach($order as $k=>$v)
            {
                $order[$k]['student_name']=explode(',',$v['student_name']);
                $order[$k]['time']=explode(',',$v['time']);
            }
            //print_r($order);die;
            $this->assign('order',$order);
            $this->display('trainclass');
        }





}