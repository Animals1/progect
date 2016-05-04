<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/26
 * Time: 8:09
 */
/*
 * 单例模式
 * 只可以被实例化一次的类
 * 有一个静态的私有属性储存变量
 * */
class Db
{
    private  static  $_instance;
    private  static  $_link;
    private
        $_connectSourse=array(
            'ip'=>'127.0.0.1',
            'username'=>'root',
            'pwd'=>'root',
            'db'=>'drivingschool'
    );

    //私有的构造方法
    private  function __construct()
    {

    }
    //公有的静态方法
    public static  function getInfo()
    {
        if(!(self::$_instance instanceof self))
        {
            self::$_instance=new self();
        }
        return  self::$_instance;
    }
    //连接数据库方法
    public  function connect()
    {

        if(!self::$_link)
        {
            @self::$_link=mysqli_connect($this->_connectSourse['ip'],$this->_connectSourse['username'],$this->_connectSourse['pwd'],$this->_connectSourse['db']);
            if(!self::$_link)
            {
                //die("mysql connect error ".mysqli_errno());
                //抛出异常
                throw new Exception();
            }
            mysqli_query(self::$_link,'set names utf8');
        }
        return self::$_link;
    }

}

//测试
/*$connect=Db::getInfo()->connect();
$sql="select * from hot";
$res=mysqli_query($connect,$sql);
//返回受影响的行数
echo mysqli_num_rows($res);*/

