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
        if(isset($echoStr)){
          //这儿的 $echoStr必须输出否则微信端的URL配置不会成功
           echo $echoStr;exit;
        }else{
       //用户首次关注我们的微信的时候走这一步
            $this->responseMsg();
        }
    }
    //验证服务器地址的有效性
    private function checkSignature()
   {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        //token值
        $token = 'weixxin';
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
   private function receiveText($object)
   {
       $funcFlag = 0;
       $contentStr = "你发送的内容为：".$object->Content;
       $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
        return $resultStr;
   }
    
   private function receiveEvent($object)
   {
       $contentStr = "";
        switch ($object->Event)
       {
           case "subscribe":
                $contentStr = "您好，为了给您提供更好的服务，确定从3月29日开始执行夏季训练模式。
                点击查看→关于启用夏季训练时段的通知

                我们还推出浪漫四月活动
                romantic不断
                点击右下角【劲爆活动】可查看

                有什么问题还可以直接在微信下面问我哦
                我会尽快回复你哒

                /微笑/微笑/微笑/微笑";
           case "unsubscribe":
                break;
            case "CLICK":
               switch ($object->EventKey)
               {
                    case "knowlege":
                       $contentStr[] = array("Title" =>"远达驾校", 
                        "Description" =>"  远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。 ", 
                        "PicUrl" =>"http://101.200.202.203/weixin/thinkphp/Public/images/001.jpg", 
                        "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/weixin/driving_knowledge");
                        break;
                    case "phone":
                       $contentStr[] = array("Title" =>"手机官网", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/group.jpg", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html");
                       break;
                       case "route":
                       $contentStr[] = array("Title" =>"远达驾校", 
                        "Description" =>"  远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。 ", 
                        "PicUrl" =>"http://101.200.201.202/Tp/Public/image/logo.jpg", 
                        "Url" =>"http://101.200.201.202/Tp/Application/Home/View/Index/knowlege.html");
                        break;
                     case "class":
                        $contentStr[] = array("Title" =>"班型介绍", 
                          "Description" =>"远达驾校成立于1992年10月。作为驾驶技能教学部门，驾校承担着公安大学在校学生驾驶培训实习任务，并且为社会人士考取驾照提供优质服务。", 
                         "PicUrl" =>"http://101.200.202.203/weixin/thinkphp/Public/images/20150922190354_23972.jpg", 
                         "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/introduce/introduce");
                       break;  
                      case "test":
                       $contentStr = array(0=>array("Title" =>"习近平出席政协十二届四次会议开幕会", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/1.jpg", 
                       "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/introduce/introduce"),1=>array("Title" =>"辽宁原省委书记王珉涉严重违纪接受组织调查", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/group.jpg", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"金正恩回应对朝制裁议案:随时准备使用核弹头", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/group.jpg", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"表演艺术家葛存壮去世 系葛优父亲(图)", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/group.jpg", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"亚视今遣散所有员工停播 香港官方表遗憾", 
                        "Description" =>"峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/group.jpg", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"));
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
                        "Description" =>"远程驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，海淀驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://bishengforever.applinzi.com/images/logo.png", 
                        "Url" =>"http://bishengforever.applinzi.com/about.html");
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
    /***
    展示驾校知识页面
    */
    public function driving_knowledge()
    {

      $this->display('driving_knowledge');
    }
     
}