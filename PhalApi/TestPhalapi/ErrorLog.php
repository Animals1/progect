<?php
/**
 * 错误日志
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 15:11
 */
    require_once ('./Common.php');
    require_once ('./Response.php');
    require_once ('./Db.php');

    class ErrorLog extends Common
    {
        public function index()
        {
            //初始化  验证固定参数
            $this->check();
            //接受错误日志
            $error_log=isset($_POST['error_log']) ? $_POST['error_log'] : "";
            $create_time = time();
            if(!$error_log)
            {
                return Response::show(401,'错误日志为空');
            }
            //添加错误日志信息入表  error_log
            $link = Db::getInfo()->connect();
            $sql="insert into error_log (app_id,version_id,version_mini,did,error_log,create_time) values ('{$this->param[app_id]}','{$this->param[version_id]}','{$this->param[version_mini]}','{$this->param[did]}','$error_log','$create_time')";
            $result = mysqli_query($link,$sql);
            if($result)
            {
                return Response::show(200,'错误日志插入成功');
            }else
            {
                return Response::show(400,'错误日志插入失败');
            }
        }
    }

    $error=new ErrorLog();
    $error->index();