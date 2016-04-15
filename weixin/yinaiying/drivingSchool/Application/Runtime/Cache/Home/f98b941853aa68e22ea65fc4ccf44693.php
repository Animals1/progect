<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/color_orange.css" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/main.css" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/share_and_recommond.css" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/common.css" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/font-awesome_1.css" />
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/jquery.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/jquery_min.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/iscroll.js"></script>
<title>国贸线</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
        <!-- Mobile Devices Support @begin -->
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Mobile Devices Support @end -->
                                <link rel="stylesheet" type="text/css" href="/drivingSchool/Public/routeInfo/css/weimobfont_1.css" media="all" />
        <link rel="shortcut icon" href="http://stc.weimob.com/img/favicon.ico" />
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        		<div data-role="container" class="body article">		
			<header data-role="header"></header>
			<section data-role="body">
				<section  class="top">
					<span>
											<img src="/drivingSchool/Public/routeInfo/picture/20160317094915_35211.jpg"/>
							
					</span>
				</section>
				<article class="article">
					<header>
						<h3>国贸线</h3>
						<sapn>2015-09-21</span>
					</header>
					<div class="content">
										<div style="text-align:center;">
	<img src="/drivingSchool/Public/routeInfo/picture/20150923113805_18379.png" alt="" /><br />
</div>										</div>
				</article>
			</section>
			<section style="width:95%; margin:0px auto;">
	<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
		<img src="/drivingSchool/Public/routeInfo/images/guide.png">
	</div>
	<div class="text" id="content">
		<div id="mess_share">
			<div id="share_1">
				<button class="button2" onclick="document.getElementById('mcover').style.display='block';">
					<img src="/drivingSchool/Public/routeInfo/picture/icon_msg.png">&nbsp;发送给朋友
				</button>
			</div>
			<div id="share_2">
				<button class="button2" onclick="document.getElementById('mcover').style.display='block';">
					<img src="/drivingSchool/Public/routeInfo/picture/icon_timeline.png">&nbsp;分享到朋友圈
				</button>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</section>
<div style="padding-bottom:5px!important;">
	<a href="javascript:window.scrollTo(0,0);" style="font-size:12px;margin:5px auto;display:block;color:#fff;text-align:center;line-height:35px;background:#333;margin-bottom:-10px;">返回顶部</a>
</div>

<!--
分享前控制
-->
	<script>
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			
			window.shareData = {
				"imgUrl": "picture/20160317094915_35211.jpg",
				"timeLineLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"sendFriendLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"weiboLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"tTitle": "国贸线",
				"tContent": "",
				"fTitle": "国贸线",
				"fContent": "",
				"wContent": ""
			};

			// 发送给好友
			WeixinJSBridge.on('menu:share:appmessage', function (argv) {
				WeixinJSBridge.invoke('sendAppMessage', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.sendFriendLink,
					"desc": window.shareData.fContent,
					"title": window.shareData.fTitle
				}, function (res) {
					_report('send_msg', res.err_msg);
				})
			});

			// 分享到朋友圈
			WeixinJSBridge.on('menu:share:timeline', function (argv) {
				WeixinJSBridge.invoke('shareTimeline', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.timeLineLink,
					"desc": window.shareData.tContent,
					"title": window.shareData.tTitle
				}, function (res) {
					_report('timeline', res.err_msg);
				});
			});

			// 分享到微博
			WeixinJSBridge.on('menu:share:weibo', function (argv) {
				WeixinJSBridge.invoke('shareWeibo', {
					"content": window.shareData.wContent,
					"url": window.shareData.weiboLink,
				}, function (res) {
					_report('weibo', res.err_msg);
				});
			});
		}, false)
	</script>
			<footer data-role="footer">
									<div class="copyright" ><a href="/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com" style="color:#B70000">© 北京市公交驾校</a></div>
					
			</footer>
		</div>

	<style>
		footer {
			height: 70px;
			overflow: hidden;
			margin-top: -70px;
			position: relative;
			z-index: 10;
		}
	</style>
    <script>
            window.shareData = {
            "imgUrl": "picture/20160317094915_35211.jpg",
            "timeLineLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
            "sendFriendLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
            "weiboLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&did=2185662&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
            "tTitle": "国贸线",
            "tContent": "",
            "fTitle": "国贸线",
            "fContent": "",
            "wContent": "",
            "callback": "shareCallBack",
            "t_callback_func": "shareCallBack",
            "f_callback_func": "shareCallBack"
        };
        
        function shareCallBack(){
        }

        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function (argv) {
                WeixinJSBridge.invoke('sendAppMessage', {
                    "img_url": window.shareData.imgUrl,
                    "img_width": "640",
                    "img_height": "640",
                    "link": window.shareData.sendFriendLink,
                    "desc": window.shareData.fContent,
                    "title": window.shareData.fTitle
                }, function (res) {
                    _report('send_msg', '111111');
                })
            });

            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function (argv) {
                WeixinJSBridge.invoke('shareTimeline', {
                    "img_url": window.shareData.imgUrl,
                    "img_width": "640",
                    "img_height": "640",
                    "link": window.shareData.timeLineLink,
                    "desc": window.shareData.tContent,
                    "title": window.shareData.tTitle
                }, function (res) {
                    _report('timeline', res.err_msg);
                });
            });

            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function (argv) {
                WeixinJSBridge.invoke('shareWeibo', {
                    "content": window.shareData.wContent,
                    "url": window.shareData.weiboLink
                }, function (res) {
                    _report('weibo', res.err_msg);
                });
            });
        }, false);
    </script>
						<div mark="stat_code" style="width:0px; height:0px; display:none;">
					</div>
	</body>
		<script type="text/javascript">
(function() {
	var wtj = document.createElement('script'); wtj.type = 'text/javascript'; wtj.async = true;
	wtj.src = 'http://tj.weimob.com/wtj.js?url=' + encodeURIComponent(location.href);
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wtj, s);
})();
function weimobAfterShare(shareFromWechatId,sendFriendLink,shareToPlatform){
	var wmShare = document.createElement('script'); wmShare.type = 'text/javascript'; wmShare.async = true;
    wmShare.src = 'http://tj.weimob.com/api-share.js?fromWechatId=' + shareFromWechatId + '&shareToPlatform=';
	wmShare.src += shareToPlatform + '&pid=55600086&sendFriendLink=' + encodeURIComponent(sendFriendLink);
    var stj = document.getElementsByTagName('script')[0]; stj.parentNode.insertBefore(wmShare, stj);
}
/* js 授权分享统计送积分*/
function weimobGrantShare(shareToPlatform)
{
    var shareFromWechatId = "";
    if (shareToPlatform == 'appmessage') {
        sendFriendLink = window.shareData.sendFriendLink;
    } else if (shareToPlatform == 'timeline') {
        sendFriendLink = window.shareData.timeLineLink;
    } else if (shareToPlatform == 'weibo') {
        sendFriendLink = window.shareData.weiboLink;
    }


    var wmShare = document.createElement('script'); wmShare.type = 'text/javascript'; wmShare.async = true;
    wmShare.src = 'http://tj.weimob.com/api-share.js?fromWechatId=' + shareFromWechatId + '&shareToPlatform=';
    wmShare.src += shareToPlatform + '&pid=55600086&sendFriendLink=' + encodeURIComponent(sendFriendLink);
    var stj = document.getElementsByTagName('script')[0]; stj.parentNode.insertBefore(wmShare, stj);
}

/**
 * 默认分享出去的数据
 *
 */
function getShareImageUrl(){

	var share_imgurl = "";
	if("" == share_imgurl){
		var shareImgObj = document.getElementsByClassName("shareImgUrl")[0];
		if('undefined' != typeof(shareImgObj)){
			share_imgurl = shareImgObj.src;
		}
	}
	return window.shareData.imgUrl || share_imgurl;
}

window.shareData = window.shareData || {
		"timeLineLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&wechatid=fromUsername&did=2185662&from=list&wxref=mp.weixin.qq.com",
	"sendFriendLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&wechatid=fromUsername&did=2185662&from=list&wxref=mp.weixin.qq.com",
	"weiboLink": "http://55600086.m.weimob.com/weisite/detail?pid=55600086&bid=56315020&wechatid=fromUsername&did=2185662&from=list&wxref=mp.weixin.qq.com",
	"tTitle": document.title,
	"tContent": document.title,
	"fTitle": document.title,
	"fContent": document.title,
	"wContent": document.title
};

//loadChangeUrlChannel("timeLineLink","fc");
//loadChangeUrlChannel("sendFriendLink","f");
if(!window.pass_share){
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	//loadChangeUrlChannel();
	// 发送给好友
	WeixinJSBridge.on('menu:share:appmessage', function (argv) {
		WeixinJSBridge.invoke('sendAppMessage', { 
			"img_url": getShareImageUrl(),
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.sendFriendLink,
			"desc": window.shareData.fContent,
			"title": window.shareData.fTitle
		}, function (res) {
			if('send_app_msg:cancel' != res.err_msg){
				weimobAfterShare("",window.shareData.sendFriendLink,'appmessage');
                
                var callback = window.shareData.f_callback_func;
                if( callback != "" ){
                    eval(callback).call(this);
                }
			}
			_report('send_msg', res.err_msg);
		})
	});

	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function (argv) {
		setTimeout("", 100);
		WeixinJSBridge.invoke('shareTimeline', {
			"img_url": getShareImageUrl(),
			"img_width": "640",
			"img_height": "640",
			"link": window.shareData.timeLineLink,
			"desc": window.shareData.tContent,
			"title": window.shareData.tTitle
		}, function (res) {
			if('share_timeline:cancel' != res.err_msg){
				//如果用户没有取消
				weimobAfterShare("",window.shareData.timeLineLink,'timeline');
                
                var callback = window.shareData.t_callback_func;
                if( callback != "" ){
                    eval(callback).call(this);
                }
			}
			_report('timeline', res.err_msg);
		});
	});

	// 分享到微博
	WeixinJSBridge.on('menu:share:weibo', function (argv) {
		WeixinJSBridge.invoke('shareWeibo', {
			"content": window.shareData.wContent,
			"url": window.shareData.weiboLink
		}, function (res) {
			if('share_weibo:cancel' != res.err_msg){
				weimobAfterShare("",window.shareData.weiboLink,'weibo');
			}
			_report('weibo', res.err_msg);
		});
	});
}, false);
}

</script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/chatfloat.js"></script>
<script type="text/javascript">
var str_domain = location.href.split('/',4)[2];
var boolIsTest = true;
if(str_domain == 'www.weimob.com' || str_domain.indexOf('m.weimob.com') > 0){
	boolIsTest = false;
}
//1.0 web
new ChatFloat({
        AId: '55600086',
        openid: "",
		top:150,
		right:0,
		IsTest:boolIsTest
});
</script>

<!--
echo STATIC_DOMAIN."/src/jQuery.js?v=10101011 
-->
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/share_channel.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/base64.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/st.js"></script>
<script type="text/javascript">
 //var jq=$.noConflict();
 //使用案例如###如若上线请到研发群找我@赵增煜###
st.push("_triggerEvent",{
		"is_statistic_on":"on", //开关
		"statisticServerPath": "http://statistic.weimob.com/wm.js", //统计地址
		"memcServerPath": "http://statistic.weimob.com/memc?cmd=get", //缓存地址
		"stat_action":"loadPage",  //统计动作类型
		"stat_optValue":""    //参数值
});
</script>

<!-- weixin js sdk start-->
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/routeInfo/js/weixin.js"></script>
<script type="text/javascript">
// alert(window.shareData.t_callback_func);
// alert('getShareImageUrl'+window.shareData.f_callback_func);
var imgUrl= getShareImageUrl();
_share.push("_shareEvent",{
		"is_share_on":"on", //开关
		"pid":55600086,
		"bid":"",
		"mUrl":"http://m.weimob.com",
		"optVal":
        {
            "shareLink": window.shareData.timeLineLink,
            "shareTitle": window.shareData.tTitle,
            "shareContent":window.shareData.tContent,
            "shareImg":window.shareData.imgUrl,
            "t_callback_func":window.shareData.t_callback_func,
            "f_callback_func":window.shareData.f_callback_func,
            "shareType":"",     
            "shareDataUrl":""
        }
});
</script>
<!-- weixin js sdk end -->
</html>