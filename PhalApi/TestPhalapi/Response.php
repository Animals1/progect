<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/23
 * Time: 8:29
 */

class Response
{
    const JSON='json';
    /***
     *  按综合方式输出通信数据
     *  @param  interger  $code    状态码
     *  @param  string    $message 提示信息
     *  @param  array     $data    数据
     *  @param  string    $type    数据类型
     *  return  string
     */
    public static  function show($code,$message,$data=array(),$type=self::JSON)
    {
        if(!is_numeric($code))
        {
            return "";
        }

        $type=isset($_GET['format']) ? $_GET['format'] : self::JSON;

        $result=array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        //判断type的类型
        if($type=='json')
        {
            self::json($code,$message,$data);
        }
        else if ($type=='xml')
        {
            self::xml($code,$message,$data);
        }
        else if ($type=='array')//调试模式   不会解析
        {
            var_dump($result);
        }else
        {
            //TODO 后续继续开发
        }
    }




    /***
     *  按json方式输出通信数据
     *  @param  interger  $code 状态码
     *  @param  string    $message 提示信息
     *  @param  array     $data    数据
     *  return  string
     */

    public static function json($code,$message='',$data=array())
    {
        //判断code是否为数字
        if(!is_numeric($code))
        {
            return "";
        }

        $result=array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        echo json_encode($result);exit;
    }

    /***
     *  按xml方式输出通信数据
     *  @param  interger  $code 状态码
     *  @param  string    $message 提示信息
     *  @param  array     $data    数据
     *  return  string
     */

    public static function xml($code,$message='',$data=array())
    {
        //判断code是否是数字
        if(!is_numeric($code))
        {
            return "";
        }

        $result=array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        header("Content-Type:text/xml");
        $xml='<?xml version="1.0" encoding="UTF-8" ?>';
        $xml.='<root>';
        $xml.=self::xmlEncode($result);
        $xml.='</root>';
        echo $xml;exit;

    }
    //xml调用函数  解析xml格式
    public static function xmlEncode($data)
    {
        $xml=$attr="";
        foreach($data as $key=>$value)
        {
            //xml格式的节点不能为数字  将数字进行转换
            if(is_numeric($key))
            {
                $attr="id='{$key}'";
                $key='item';
            }
            $xml.="<{$key} {$attr}>";
            //递归调用
            $xml.=is_array($value) ? self::xmlEncode($value) : $value;
            $xml.="</$key>";
        }
        return $xml;
    }
}