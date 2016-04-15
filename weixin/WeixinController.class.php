<?php
/**
*微信开发---驾校模块开发
*@author：chengjunhua
*/     
namespace Home\Controller;
use Think\Controller;
class WeixinController extends Controller {
    public function index(){
        //获得4个参数开发前必须接的四个参数
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $echoStr = $_GET["echostr"];  
        //获得token值
        $token = 'weixin';
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature && $echoStr ){
          //这儿的 $echoStr必须输出否则微信端的URL配置不会成功
           echo $echoStr;exit;
        }else{
       //用户首次关注我们的微信的时候走这一步
            $this->responseMsg();
        }
    }

    public function responseMsg()
    {
		//获取微信推送过来的post的值
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //var_dump($postStr);die;
      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "您好，为了给您提供更好的服务，确定从3月29日开始执行夏季训练模式。
点击查看→关于启用夏季训练时段的通知
<a href=http://mp.weixin.qq.com/s?__biz=MzA4MjgzNzQwNg==&mid=411811546&idx=1&sn=631948c0eed7f19c66ca1a0e3ada0345#rd 

 style='color:red';>关于启用夏季训练时段的通知</a>

我们还推出【约“惠”春天】班型
拿本快，价格低
点击右下角【驾校活动】可查看
有什么问题还可以直接在微信下面问我哦
我会尽快回复你哒

/抠鼻";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "asasa";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}