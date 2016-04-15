<?php
namespace Home\Controller;
use Think\Controller;
class MaintainController extends Controller {
	/*
    *   by郭旭峰
    *   公司维护-基本信息
    */

    /*
    *   企业介绍
    */
    public function introduction(){
        $data = D("company");
        $arr = $data->introduction();
        if($arr){
            //成功(将当前企业介绍的id存入session便于基础信息、企业资质的添加)
        }else{
            //失败
        }
    }


    /*
    *   基础信息
    */
    public function basics(){
        $sesid = session("company_id");
        $data = D("company");
        $arr = $data->basics($sesid);
        if($arr){
            //成功
        }else{
            //失败
        }
    }



    /*
    *   企业资质(多文件上传)
    */
    public function qualifications(){
        $sesid = session("company_id");
        $data = D("company");
        $arr = $data->qualifications($sesid);
        if($arr){
            //成功
        }else{
            //失败
        }

    }


    /*
    *   公司展示(多文件上传)
    */
    public function companyshow(){
        $sesid = session("company_id");
        $data = D("company");
        $arr = $data->companyshow($sesid);
        if($arr){
            //成功
        }else{
            //失败
        }
    }
       

}