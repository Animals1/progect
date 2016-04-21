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
        $this->assign("arr",$arr);
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