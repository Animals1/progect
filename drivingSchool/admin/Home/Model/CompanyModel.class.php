<?php
namespace Home\Model;
use Think\Model;
class CompanyModel extends Model {


    /*
    *   by 郭旭峰
    *   公司维护-基本信息
    */


    /*
     * 查询数据
     * */
    public function indexsele()
    {
        return $this->Table("company")->order("company_id desc")->limit(1)->select();
    }
    /*
     * 删除数据
     *@$where   条件
     * */
    public function delValue($where)
    {
        return $this->where($where)->delete();
    }


    /*
    *   企业介绍
    */
    public function introduction(){
        //接收信息
        $company_person = $_POST['company_person'];
        $company_tel = $_POST['company_tel'];
        $company_fax = $_POST['company_fax'];
        $company_brief = $_POST['company_brief'];


        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./";
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();

        $img=$info['img']['savepath'].$info['img']['savename'];
        $img2=substr($img,9);
        $data=array("company_logo"=>$img2,"company_person"=>$company_person,"company_tel"=>$company_tel,"company_fax"=>$company_fax,"company_brief"=>$company_brief);
        if($info) {
            return $this->Table("company")->add($data);
        }
    }



    /*
    *   基础信息
    */
    public function basics($id){
        $company_desc = $_POST['company_desc'];
        $data["company_desc"] = $company_desc;
        return $this->Table("company")->where("company_id=$id")->save($data);
    }


    /*
    *   企业资质(多文件上传)
    */
    public function qualifications($id){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./";
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();

        $img=$info['img']['savepath'].$info['img']['savename'];
        $img2=substr($img,9);

        $img3=$info['img1']['savepath'].$info['img1']['savename'];
        $img4=substr($img3,9);

        $img5=$info['img2']['savepath'].$info['img2']['savename'];
        $img6=substr($img5,9);

        $company_quality = $img2.",".$img4.",".$img6;


        $data['company_quality'] = $company_quality;
        if($info) {
            return $this->Table("company")->where("company_id='$id'")->save($data);
        }
    }


    /*
    *   公司展示
    */
    public function companyshow($id){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./";
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();

        $img=$info['img3']['savepath'].$info['img3']['savename'];
        $img2=substr($img,9);

        $img3=$info['img4']['savepath'].$info['img4']['savename'];
        $img4=substr($img3,9);

        $img5=$info['img5']['savepath'].$info['img5']['savename'];
        $img6=substr($img5,9);

        $company_show = $img2.",".$img4.",".$img6;

        $data['company_show'] = $company_show;
        if($info) {
            return $this->Table("company")->where("company_id='$id'")->save($data);
        }
    }



}
?>