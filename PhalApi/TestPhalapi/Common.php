<?php
/**
 * 公共继承类  APP每个页面都会提交几个参数  对参数进行判断
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 10:58
 */
require_once ('./Response.php');
require_once ('./Db.php');
class Common
{
    public $param;
    public $app;
    public function check()
    {
        $this->param['app_id'] = $app_id = isset($_POST['app_id']) ? $_POST['app_id'] : "";
        $this->param['did'] = $did = isset($_POST['did']) ? $_POST['did'] : "";
        $this->param['version_id'] = $version_id = isset($_POST['version_id']) ? $_POST['version_id'] : "";
        $this->param['version_mini'] = $version_mini = isset($_POST['version_mini']) ? $_POST['version_mini'] : "";
        $this->param['encrypt_id'] = $encrypt_id = isset($_POST['encrypt_id']) ? $_POST['encrypt_id'] : "";

        //判断app_id && version_id是否是数值
        if(!is_numeric($app_id) && !is_numeric($version_id))
        {
            return Response::show(401,'参数不合法');
        }

        //判断APP是否需要加密
        $this->app = $this->getadd($app_id);

        if(!$this->app)
        {
            return Response::show(402,'app_id不存在');
        }

        //加密判断
        if($this->app['is_encryption'] && $encrypt_id!=md5($did.$this->app['key']))
        {
            return Response::show(403,'没有该权限');
        }

    }

    //app表
    public function getadd($id)
    {
        $link=Db::getInfo()->connect();
        $sql="select * from app where id={$id} and status=1 ";
        $result=mysqli_query($link,$sql);
        return mysqli_fetch_assoc($result);
    }

    //版本升级表
    public function versionupgrade($appid)
    {
        $link=Db::getInfo()->connect();
        $sql="select * from version_upgrade where app_id={$appid} and status=1";
        $result=mysqli_query($link,$sql);
        return mysqli_fetch_assoc($result);
    }

}

