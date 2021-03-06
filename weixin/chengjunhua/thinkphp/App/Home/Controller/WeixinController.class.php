<?php
/**
*微信开发---驾校模块开发
*@author：chengjunhua
*/
namespace Home\Controller;
use Think\Controller;

class WeixinController extends Controller {
  public $appid="wx7172256529f9d0c2";
  public $appsecret="43fc13371496f3ba3f10b1bdd891c16f";
  public $lasttime='';
  public $access_token='';
  /**
  *获取access_token值
  */
    public function __construct()
    {
        $redius    = new \Common\Org\Redis();
      // $redius->set('aa','324367856');
      //  echo $redius->get('aa');die;
         $arr=$redius->get('access_token');
         if(!empty($arr))
         {
            $this->lasttime = $arr['1'];
            if(time()>$this->lasttime+7200)
            {
             // echo 1;
              $this->get_tocken();
            }

         }
         else
         {
           // echo 2;
             $this-> get_tocken();
         }  
    }
    public function get_tocken()
    {
            $redius    = new \Common\Org\Redis();
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $res = $this->https_request($url);
            $result = json_decode($res, true);
            // print_r($result);die;
            //save to Database or Memcache or radis
            //将生成的access_token值存储在redius中
            $redius->set('access_token',array('0'=>$result["access_token"],'1'=>time()));
    }
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
                case "location"://坐标显示
                   $resultStr = $this->receiveLocation($postObj);
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
       // $funcFlag = 0;
       // $contentStr = "你发送的内容为：".$object->Content;
       // $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
       //  return $resultStr;
        $funcFlag = 0;
        $keyword = trim($object->Content);
        
        //urlencode可以把城市转化为%北京%（$object->ToUserName为开发者的微信号）
        $url = "http://apix.sinaapp.com/weather/?appkey=".$object->ToUserName."&city=".urlencode($keyword); 
        $output = file_get_contents($url);
        $content = json_decode($output, true);
        //如果有城市将返回的json串转化为数组，否则没有该城市那么将返回的我不是数组
        if(is_array($content))
        {
          $result = $this->transmitNews($object, $content,$funcFlag);
        }
        else
        {
          //  //多客服人工回复模式
          // if (strstr($keyword, "您好") || strstr($keyword, "你好") || strstr($keyword, "在吗")){
          //     $result = $this->transmitService($object);
          // }
          // else
          // {
              $contentStr = "你发送的内容为：".$keyword;
              $result = $this->transmitText($object, $contentStr, $funcFlag);
          // }
  
        } 
        
        return $result;
   }
    
   private function receiveEvent($object)
   {
      if($object->Event=='subscribe')
      {
        $oop=$this->get_user_info($object);
      }
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
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/130327/1-13032F02503644.jpg", 
                       "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/index/index");
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
                       $contentStr = array(0=>array("Title" =>"科目二弯道驾驶技巧", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/allimg/130405/1_2105083671.gif", 
                       "Url" =>"http://101.200.202.203/weixin/thinkphp/index.php/Home/introduce/introduce"),1=>array("Title" =>"科目一安全文明驾驶笔试知识点", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/allimg/130405/1_2103141941.gif", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"科目二安全文明驾驶笔试知识点", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!峰艺工作室主要从平面设计，软件开发，网站设计，网站开发的公司，位于北京中关村南路。", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/allimg/130405/1_2105083671.gif", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"科目三安全文明驾驶笔试知识点", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/allimg/130405/1_2112233301.gif", 
                       "Url" =>"http://bishengforever.applinzi.com/group.html"),array("Title" =>"科目四安全文明驾驶笔试知识点", 
                        "Description" =>"远达驾校在展览馆路地区、知春路大运村地区、安立路北苑地区、西三旗、安贞桥地区、北太平庄地区、学院路地区、紫竹桥地区、苏州桥地区健翔桥地区、清河地区、安宁庄地区、上地地区、史各庄地区设立了海淀驾校展览路报名中心、知春路报名中心、北苑路报名中心、西三旗报名中心、安贞桥报名中心、北太平庄报名中心、学院路报名中心、紫竹桥报名中心、苏州桥报名中心、健翔桥报名中心、清河报名中心、安宁庄报名管理处、永旺商城报名中心，为周边高校、科研院所和企事业单位的海驾学员提供现场报名、上门报名服务。工作时间为周一至周日早8:30至晚18:00，满意在海驾，远达驾校永远欢迎您的到来!", 
                       "PicUrl" =>"http://www.haijiaw.com/uploads222/allimg/130405/1_2113449211.gif", 
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
                case "pic_sysphoto":
                $contentStr = "系统拍照";
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
          <ArticleCount>".count($arr_item)."</ArticleCount>
          <Articles>
          $item_str</Articles>
          <FuncFlag>%s</FuncFlag>
          </xml>";

        $resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $funcFlag);
        return $resultStr;
    }
    /**
    *回复多客服消息
    */

 //    private function transmitService($object)
 //    {
 //        $xmlTpl = " <xml>
 //     <ToUserName><![CDATA[%s]]></ToUserName>
 //     <FromUserName><![CDATA[%s]]></FromUserName>
 //     <CreateTime>%s</CreateTime>
 //     <MsgType><![CDATA[transfer_customer_service]]></MsgType>
 //     <TransInfo>
 //         <KfAccount><![CDATA[test1@llydsm]]></KfAccount>
 //     </TransInfo>
 // </xml>";
 //        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
 //        return $result;
 //    }

  //接收位置消息
    private function receiveLocation($object)
    {
        $content = "你发送的是位置，纬度为：".$object->Location_X."；经度为：".$object->Location_Y."；缩放级别为：".$object->Scale."；位置为：".$object->Label;
        $result = $this->transmitText($object, $content);
        return $result;
    }
    //获取用户基本信息
    public function get_user_info($object)
    {                                                                                                       
       $redis    = new \Common\Org\Redis();
        $arr=$redis->get('access_token');

        $openid=$object->FromUserName;
       // $access_token="3OfYRHBA4Z5IjuaoTrpHVDd7-asgLdfzGb7m0U1S0AF1WpumylD39WCQ50TdayWvBheOm641DiV-D0XKvBwI4sM3B1eL-OwPbAIOod89SjXk9lGCVdfjzRN0Key8CWXYIIVbAHAYYL";
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$arr['0']."&openid=".$openid."&lang=zh_CN";
        $res = $this->https_request($url);
        $content=json_decode($res, true);
       // print_r($content);die;
        if(is_array($content))
        {
          return $result = $this->transmitNews($object, $content);
        }
    }
      //https请求（支持GET和POST）
    protected function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    /***
    展示驾校知识页面
    */
    public function driving_knowledge()
    {

      $this->display('driving_knowledge');
    }
     
}