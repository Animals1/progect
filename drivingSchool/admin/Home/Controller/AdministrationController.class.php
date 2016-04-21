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
     * 车辆登记搜索
     * 多条件搜索,拼接条件
     * */
        public function registrationsearch()
        {
            $coach_driving=$_GET['coach_driving'];
            $coach_motor=$_GET['coach_motor'];
           //print_r($coach_motor);die;
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
            $veh=D('Vehicles');
            $car=D('Car');

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
            //驾照表
            $this->assign('driving',$driving);
            //教练车类型
            $this->assign('motor',$motor_val);
            //状态
            $this->assign('status',$status);
            $search=$veh->searchValue($where);
            $this->assign('car',$search);
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

            $this->assign('coachMess',$coachMess);
            $this->assign('status',$repair_status);
            $this->assign('repair',$repair);
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
            /*查询状态*/
            $status=D('RepairStatus');
            $repair_status=$status->getValue();
            /*查询员工*/
            $coach=D('Coach');
            $coachMess=$coach->coachMessage();
            $this->assign('coachMess',$coachMess);
            $this->assign('status',$repair_status);
            $this->assign('repair',$repair);
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
                $this->assign('repair_record',$repair_record);
                $this->display('servicerecord');
            }
            else
            {
                $car=D('Car');
                $repair_record=$car->vehrepair();
                $this->assign('repair_record',$repair_record);
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
            $record=D('GasAdd');
            $gas_record=$record->gasMessage();
            $this->assign('record',$gas_record);
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
                $this->assign('busset',$busseting);
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
            $this->assign('student',$student);
            $this->display('stureg');
        }

    /*
    * stuinschool 在校学员
    * */
        public function stuinschool()
        {
            $inschool=D('Student');
            $student_inschool=$inschool->inschoolstu();
            $status=$inschool->status();
            $driving=$inschool->driving();
            $this->assign('student',$student_inschool);
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
             * 'stu_sn':stu_sn,'stu_name':stu_name,'stu_tel':stu_tel,'laydate':laydate,'motor_id':motor_id,'sex_id':sex_id,'stu_status_id':stu_status_id
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
            $status=$inschool->status();
            $driving=$inschool->driving();
            $this->assign('student',$student_inschool);
            $this->assign('status',$status);
            $this->assign('driving',$driving);
            $this->display('stuinschool');
        }

    /*
    * regstu">入学登记
    * */
        public function regstu()
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