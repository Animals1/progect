<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/23
 * Time: 14:07
 */

class StaticFile
{
    private $_dir;
    const EXT='.txt';
    //自动加载文件路径
    public function __construct()
    {
        $this->_dir=dirname(__FILE__).'/file';
    }
    //生成静态缓存文件
    public function file($key,$value='',$cacheTime=0)
    {
        //文件名称
        $filename=$this->_dir.'/'.$key.self::EXT;

        //将value值写入缓存
        if($value!=="")
        {
            if($value==null)
            {
                unlink($filename);
                return false;
            }
            $filepath=dirname($filename);
            //判断文件路径是否存在
            if(!is_dir($filepath))
            {
                mkdir($filepath,0777);
            }
            //将缓存失效时间放入到缓存文件中
            $cacheTime=sprintf('%011d',$cacheTime);
            //将文件读入到file文件夹中
           return  file_put_contents($filename,$cacheTime.json_encode($value));
        }

        if(is_file($filename))
        {
            $fileinfo=file_get_contents($filename);
            $cacheTime=(int)substr($fileinfo,0,11);
            $value=substr($fileinfo,11);
            if($cacheTime+filemtime($filename)<time())
            {
                unlink($filename);
                return false;
            }else
            {
                return  json_decode($value,true);
            }
        }else
        {
            return false;
        }
    }
}

/*//测试
$obj=new StaticFile();
$arr=$obj->file('test1');

var_dump($arr);*/