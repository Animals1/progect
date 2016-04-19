<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	
	//第一次进入 推送欢迎信息
    public function index(){
        $echoStr = $_GET["echostr"];  
        if(isset($echoStr)){
          //echoStr存在 调用valid方法
          $this->valid();
        }else{
       //用户首次关注我们的微信的时候走这一步
            $this->responseMsg();
        }
	}
	//为了做出一个回应
	public function valid()
   {
       $echoStr = $_GET["echostr"];
       //验证服务器地址的有效性
       if($this->checkSignature()){
            echo $echoStr;
           	exit;
       }
  	}
  	//验证服务器地址的有效性
  	private function checkSignature()
   {
        $signature = $_GET["signature"];
      	$timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        //token值
        $token = 'wei';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
   }
   //返回信息
   public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr))
        {
        	//装换xml格式为obj对象
          $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        	$RX_TYPE = trim($postObj->MsgType);

          switch ($RX_TYPE)
           {
                case "text"://文本类型
                    $resultStr = $this->receiveText($postObj);
                    break;
                case "event"://事件类型
                  $resultStr = $this->receiveEvent($postObj);
                    break;
               default:
                    $resultStr = "";
                  break;
           }
            echo $resultStr;
        }else {
           echo "";
           exit;
        }
   }
   //文本类型推送消息
    function receiveText($object)
   {
        $keyword = trim($object->Content);
        //urlencode可以把城市转化为%北京%（$object->ToUserName为开发者的微信号）
        $url = "http://apix.sinaapp.com/weather/?appkey=".$object->ToUserName."&city=".urlencode($keyword);
        $output = file_get_contents($url);
        $content = json_decode($output, true);
        if($content!="没有该城市？")
        {
            $result = $this->transmitNews($object, $content);

        }else{
            //自动回复模式
            if (strstr($keyword, "你好")){
                $content = '欢迎来到远达驾校
                    您可以输入科目一考试、科目二考试、科目三考试，<a href="http://101.200.201.202/Tp/index.php/Home/Pay/index">付款</a>了解科目考试相关内容';
            }else if(strstr($keyword,"驾校")){
                $content = "欢迎来到远达驾校
                    您可以输入科目一考试、科目二考试、科目三考试，了解科目考试相关内容";
            }else if (strstr($keyword, "表情")){
                $content = "微笑：/::)\n乒乓：/:oo\n中国：".$this->bytes_to_emoji(0x1F1E8).$this->bytes_to_emoji(0x1F1F3)."\n仙人掌：".$this->bytes_to_emoji(0x1F335);
            }else if (strstr($keyword, "科目一考试")){
                $content = array();
                $content[] = array("Title"=>"科目一考试",  "Description"=>"驾照考试科目一，又称科目一理论考试、驾驶员理论考试，是机动车驾驶证考核的一部分。根据《机动车驾驶证申领和使用规定》，考试内容包括驾车理论基础、道路安全法律法规、地方性法规等相关知识。考试形式为上机考试，100道题，90分及以上过关。", "PicUrl"=>"http://101.200.201.202/Tp/Public/image/kemuyi.jpg");
            }else if (strstr($keyword, "科目二考试")){
                $content = array();
                $content[] = array("Title"=>"科目二考试",  "Description"=>"科目二，又称小路考，是机动车驾驶证考核的一部分，是场地驾驶技能考试科目的简称，考试项目包括倒车入库、侧方停车、坡道定点停车和起步、直角转弯、曲线行驶五项必考。", "PicUrl"=>"http://101.200.201.202/Tp/Public/image/test2.jpg");
            }else if (strstr($keyword, "科目三考试")){
                $content = array();
                $content[] = array("Title"=>"科目三考试",  "Description"=>"科目三，又称大路考，是机动车驾驶证考核的一部分，是机动车驾驶人考试中道路驾驶技能和安全文明驾驶常识考试科目的简称。", "PicUrl"=>"http://101.200.201.202/Tp/Public/image/test3.jpg");
            }
            else{
                $content = date("Y-m-d H:i:s",time())."\n\n".'<a href="http://101.200.202.203/weixin/thinkphp/index.php/Home/index/index">没有该关键词，您可以进入远达驾校首页</a>';
            }

            if(is_array($content)){
              if (isset($content[0])){
                    $result = $this->transmitNews($object, $content);
                }
            }else{
                $result = $this->transmitText($object, $content);
            }
        
        }
        return $result;
   }
    
    function receiveEvent($object)
   {
       $contentStr = "";
        switch ($object->Event)
       {
           case "subscribe":
                $contentStr = "您好，为了给您提供更好的服务，确定从3月29日开始执行夏季训练模式。
								点击查看→关于启用夏季训练时段的通知

								我们还推出约会春天活动
								romantic不断
								点击右下角【劲爆活动】可查看

								有什么问题还可以直接在微信下面问我哦
								我会尽快回复你哒

								/抠鼻";
           case "unsubscribe":
                break;
            case "CLICK":
               switch ($object->EventKey)
               {
                    case "knowlege":
                       $contentStr[] = array("Title" =>"远达驾校", 
                        "Description" =>"  远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。 ", 
                        "PicUrl" =>"http://101.200.201.202/Tp/Public/image/logo.jpg", 
                        "Url" =>"http://101.200.201.202/Tp/Application/Home/View/Index/knowlege.html");
                        break;
                    case "studycar":
                       $contentStr[] = array("Title" =>"学车须知", 
                        "Description" =>"学车须知", 
                       "PicUrl" =>"http://101.200 .201.202/Tp/Public/image/studycar.jpg", 
                       "Url" =>"http://101.200.201.202/Tp/index.php/Home/Studycar/studycar");
                       break;
                   
                    case "phone":
                       $contentStr[] = array("Title" =>"手机官网", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/130327/1-13032F02503644.jpg", 
                       "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/index/index");
                       break;
                    case "class":
                        $contentStr[] = array("Title" =>"班型介绍", 
                          "Description" =>"远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。", 
                         "PicUrl" =>"http://101.200.202.203/weixin/thinkphp/Public/images/20150922190354_23972.jpg", 
                         "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/introduce/introduce");
                       break; 
                    case "online":
                       $contentStr[] = array("Title" =>"在线报名", 
                        "Description" =>"  远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。 ", 
                        "PicUrl" =>"http://101.200.202.203/weixin/thinkphp/Public/images/201309171626498422.jpg", 
                        "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/online/online");
                        break;
                    case "mitting":
                      $contentStr[] = array("Title" =>"优惠春天", 
                        "Description" =>"  远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。 ", 
                        "PicUrl" =>"http://101.200.202.203/weixin/thinkphp/Public/images/83d342e25e504363a412a2887a78b30c.gif", 
                        "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/spring/spring");
                        break;
                    default:
                       $contentStr[] = array("Title" =>"驾考宝典", 
                        "Description" =>"远程驾校在展览馆路地区，海淀驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/logo.png"
                        );
                        break;
                }
                break;
            default:
               break;      

       }
        if(is_array($contentStr))
        {
           $resultStr = $this->transmitNews($object, $contentStr);
        }else{
           $resultStr = $this->transmitText($object, $contentStr);
        }
       return $resultStr;
   }
   	//将内容转换成xml格式返回
     private function transmitText($object, $content, $funcFlag = 0)
    {
       $textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>%d</FuncFlag>
					</xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $funcFlag);
        return $resultStr;
    }



   private function transmitNews($object, $arr_item, $funcFlag = 0)
    {
       //首条标题28字，其他标题39字
        if(!is_array($arr_item))
           return;

        $itemTpl = "<item>
				        <Title><![CDATA[%s]]></Title>
				       <Description><![CDATA[%s]]></Description>
				       <PicUrl><![CDATA[%s]]></PicUrl>
				       <Url><![CDATA[%s]]></Url>
					   </item>
					";
        $item_str = "";
        foreach ($arr_item as $item)
        $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);

        $newsTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<Content><![CDATA[]]></Content>
					<ArticleCount>%s</ArticleCount>
					<Articles>
					$item_str</Articles>
					<FuncFlag>%s</FuncFlag>
					</xml>";

        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }

    //字节转Emoji表情
    function bytes_to_emoji($cp)
    {
        if ($cp > 0x10000){       # 4 bytes
            return chr(0xF0 | (($cp & 0x1C0000) >> 18)).chr(0x80 | (($cp & 0x3F000) >> 12)).chr(0x80 | (($cp & 0xFC0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else if ($cp > 0x800){   # 3 bytes
            return chr(0xE0 | (($cp & 0xF000) >> 12)).chr(0x80 | (($cp & 0xFC0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else if ($cp > 0x80){    # 2 bytes
            return chr(0xC0 | (($cp & 0x7C0) >> 6)).chr(0x80 | ($cp & 0x3F));
        }else{                    # 1 byte
            return chr($cp);
        }
    }

   
 
}