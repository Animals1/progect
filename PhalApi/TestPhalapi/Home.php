<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/26
 * Time: 11:08
 */

/*
 * APP首页的接口开发     http://app.com/Home.php?page=1&pagesize=10
 * @param   integer  $page  页码
 * @param   integer  $pagesize   每页显示数量
 * */
    //包含接口
    require_once ('./Response.php');
    require_once ('./Db.php');
    require_once ('./Staticfile.php');
    $file=new StaticFile();

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $pagesize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 5;
    //判断是否是数值
    if(!is_numeric($page) || !is_numeric($pagesize))
    {
        //调用写好的接口   提示错误信息
        Response::show(401,'数据不合法');
    }
    $offset=($page-1)*$pagesize;

    $sql="select * from test1 limit $offset , $pagesize  ";
    /*
     * 连接数据库
     * 连接数据库失败  异常处理
     * 从缓存中读取数据
     * */
    $arr=array();
    if(!$arr=$file->file('test'.$page.'-'.$pagesize))
    {
        //echo 1;exit;  测试缓存文件是否存在
        try
        {
            $link=Db::getInfo()->connect();
        }catch (Exception $e)
        {
            return  Response::show(403,'数据库连接失败');
        }
        $result=mysqli_query($link,$sql);

        while($res=mysqli_fetch_assoc($result))
        {
            $arr[]=$res;
        }
        //print_r($arr);
        if($arr)
        {
            $file->file('test'.$page.'-'.$pagesize,$arr,120);
        }
    }

    /*
     * 转换成接口数据
     * */
    if($arr)
    {
        return  Response::show(200,'首页数据获取成功',$arr);
    }else
    {
        return  Response::show(400,'首页数据获取失败',$arr);
    }
