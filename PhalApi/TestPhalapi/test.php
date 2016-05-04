<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/21
 * Time: 18:32
 */

//调用response类
include ('./Response.php');
require_once ('./Db.php');

$link=Db::getInfo()->connect();
$sql="select coach_sn,motor,coach_start_year from coach";
$result=mysqli_query($link,$sql);
while($res=mysqli_fetch_assoc($result))
{
    $arr[]=$res;
}
Response::show(400,'查询用户信息失败');

