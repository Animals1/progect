<?php
/**
	*@管理员模块----公司管理
*/
namespace Home\Controller;
use Think\Controller;
class CompanyController extends Controller {

    public function index(){
        $data = D("Company");
        $arr = $data->indexsele();
        //print_r($arr);die;
        $company_quality = $arr[0]['company_quality'];
        //echo $company_quality;die;
        $newcompany_quality = explode(',',$company_quality);
        $newcompany_quality0 = $newcompany_quality[0];
        $newcompany_quality1 = $newcompany_quality[1];
        $newcompany_quality2 = $newcompany_quality[2];

        $company_show = $arr[0]['company_show'];
        //echo $company_quality;die;
        $newcompany_show = explode(',',$company_show);
        $newcompany_show0 = $newcompany_show[0];
        $newcompany_show1 = $newcompany_show[1];
        $newcompany_show2 = $newcompany_show[2];


        $this->assign("arr",$arr);
        $this->assign("newcompany_quality0",$newcompany_quality0);
        $this->assign("newcompany_quality1",$newcompany_quality1);
        $this->assign("newcompany_quality2",$newcompany_quality2);
        $this->assign("newcompany_show0",$newcompany_show0);
        $this->assign("newcompany_show1",$newcompany_show1);
        $this->assign("newcompany_show2",$newcompany_show2);
    	$this->display('company');
        }


    public function role(){
    	$this->display('role_manager');
        }
      
    public function previlege(){
    	$this->display('previlege_manager');
        }


    /*
    *   公司基本信息的添加
    *   by  郭旭峰
    */
    public function companyadd(){
        $data = D("Company");
        $arr = $data->introduction();
        if($arr){
            echo "<script>alert('保存成功');location.href='".__MODULE__."/Company/index'</script>";
        }else{
            echo "<script>alert('保存失败');location.href='".__MODULE__."/Company/index'</script>";
        }
    }


    /*
    *   公司基础信息的添加
    *   by 郭旭峰
    */
    public function basics(){
        $id = $_POST['id'];
        $data = D("Company");
        $arr = $data->basics($id);
        if($arr){
            echo "<script>alert('保存成功');location.href='".__MODULE__."/Company/index'</script>";
        }else{
            echo "<script>alert('保存失败');location.href='".__MODULE__."/Company/index'</script>";
        }
    }



    /*
    *   公司资质上传
    *   by  郭旭峰
    */
    public function qualityadd(){
        $id = $_POST['id'];
        $data = D("Company");
        $arr = $data->qualifications($id);
        if($arr){
            echo "<script>alert('保存成功');location.href='".__MODULE__."/Company/index'</script>";
        }else{
            echo "<script>alert('保存失败');location.href='".__MODULE__."/Company/index'</script>";
        }
    }


    /*
    *   公司展示上传
    *   by  郭旭峰
    */
    public function companyshow(){
        $id = $_POST['id'];
        $data = D("Company");
        $arr = $data->companyshow($id);
        if($arr){
            echo "<script>alert('保存成功');location.href='".__MODULE__."/Company/index'</script>";
        }else{
            echo "<script>alert('保存失败');location.href='".__MODULE__."/Company/index'</script>";
        }
    }
      
      

}