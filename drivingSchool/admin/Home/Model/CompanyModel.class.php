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
     * @$where  条件
     * @$order  排序字段
     * @$limit  限制几条数据
     * */
    public function getValue($where,$order,$limit)
    {
        return $this->where($where)->order("$order")->limit($limit)->find();
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
    public function basics($sesid){
        $company_desc = $_POST['company_desc'];
        $data["company_desc"] = $company_desc;
        return $this->Table("company")->where("company_id=$sesid")->add($data);
    }


    /*
    *   企业资质(多文件上传)
    */
    public function qualifications($sesid){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./";
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();

        $img=$info['logo1']['savepath'].$info['logo1']['savename'];
        $img2=substr($img,9);

        $img3=$info['logo2']['savepath'].$info['logo2']['savename'];
        $img4=substr($img3,9);

        $img5=$info['logo3']['savepath'].$info['logo3']['savename'];
        $img6=substr($img5,9);

        $company_quality = $img2.",".$img4.",".$img6;

        $data=array("company_quality"=>$company_quality);
        if($info) {
            return $this->Table("company")->where("company_id=$sesid")->add($data);
        }
    }


    /*
    *   公司展示
    */
    public function companyshow($sesid){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath="./";
        $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();

        $img=$info['show1']['savepath'].$info['show1']['savename'];
        $img2=substr($img,9);

        $img3=$info['show2']['savepath'].$info['show2']['savename'];
        $img4=substr($img3,9);

        $img5=$info['show3']['savepath'].$info['show3']['savename'];
        $img6=substr($img5,9);

        $company_quality = $img2.",".$img4.",".$img6;

        $data=array("company_show"=>$company_show);
        if($info) {
            return $this->Table("company")->where("company_id=$sesid")->add($data);
        }
    }
}
?>