<?php
/**
 * title :定时生成缓存任务
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 9:22
 */
    //APP直接调用生成的缓存文件
    require_once ('./Staticfile.php');
    require_once ('./Response.php');
    $file=new StaticFile();
    $arr=array();
    if($arr=$file->file('test'))
    {
        return Response::show(200,'数据返回成功',$arr);
    }else
    {
        return Response::show(200,'首页获取数据失败',$arr);
    }

    exit;
    //crontab  定时生成缓存  每5分钟生成一次缓存  */5 * * * * php/bin/php  /test.php

    require_once ('./Db.php');
    require_once ('./Staticfile.php');
    $file=new StaticFile();
    $sql="select * from test1";
    try
    {
        $link=Db::getInfo()->connect();
    }catch (Exception $e)
    {
        //生成缓存文件出错时   生成日志文件
        file_put_contents('./logs/'.date('y-m-d').'.txt',$e->getMessage());

    }
    @$result=mysqli_query($link,$sql);

    while(@$res=mysqli_fetch_assoc($result))
    {
        $arr[]=$res;
    }
    //定时生成缓存文件
    if($arr)
    {
        $file->file('test',$arr,1200);
    }else
    {
        //生成具有错误提示的日志文件
        file_put_contents('./logs/'.date('y-m-d').'.txt','没有相关数据');
    }