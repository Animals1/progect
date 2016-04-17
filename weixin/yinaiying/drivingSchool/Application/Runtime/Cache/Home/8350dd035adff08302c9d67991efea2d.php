<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/drivingSchool/Public/route/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/route/css/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/route/css/font-awesome.css" media="all" />
<link rel="stylesheet" type="text/css" href="/drivingSchool/Public/route/css/home-66.css" media="all" />
<script type="text/javascript" src="/drivingSchool/Public/route/js/jquery.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/zepto.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/swipe.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/iscroll.js"></script>
<title>北京市公交驾校</title>
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
        <link rel="stylesheet" type="text/css" href="/drivingSchool/Public/route/css/weimobfont.css" media="all" />
        <link rel="shortcut icon" href="http://stc.weimob.com/img/favicon.ico" />
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <div class="body">
	<header id="scroll_pic_view" class="scroll_pic_view">
	<div id="scroll_pic_view_div">
		<ul id="scroll_pic_view_ul">
			
						<li>
								<a onclick="return false;">
									<img src="/drivingSchool/Public/route/images/20160324135952_24700.jpg" class="shareImgUrl" />
				</a>
			</li>
						<li>
								<a onclick="return false;">
									<img src="/drivingSchool/Public/route/images/20160324135524_93912.jpg" class="shareImgUrl" />
				</a>
			</li>
						<li>
								<a onclick="return false;">
									<img src="/drivingSchool/Public/route/images/20160414145518_65942.jpg" class="shareImgUrl" />
				</a>
			</li>
						<li>
								<a onclick="return false;">
									<img src="/drivingSchool/Public/route/images/20160324140147_48974.jpg" class="shareImgUrl" />
				</a>
			</li>
						<li>
								<a onclick="return false;">
									<img src="/drivingSchool/Public/route/images/20160324140300_74989.jpg" class="shareImgUrl" />
				</a>
			</li>
						
		</ul>
	</div>
	<div>
		<ol id="scroll_pic_nav" class="scroll_pic_nav">
			<script>
				(function(d, $){
					var scrollPicView = d.getElementById("scroll_pic_view"),
					scrollPicViewDiv = d.getElementById("scroll_pic_view_div"),
					lis = scrollPicViewDiv.querySelectorAll("li"),
					w = scrollPicView.offsetWidth,
					len = lis.length;
					for(var i=0; i<len; i++){
						lis[i].style.width = w+"px";
						if(i == len-1){
							scrollPicViewDiv.style.width = w * len + "px";
						}
					}

					var scroll_pic_view = new iScroll('scroll_pic_view', { 
						snap: true,
						momentum: false,
						hScrollbar: false,
						useTransition: true,
						onScrollEnd: function() {
							$("#scroll_pic_nav li").removeClass("on").eq(this.currPageX).addClass("on");
							//$("#scroll_pic_nav li.on").prev().addClass("left");
							//$("#scroll_pic_nav li.on").next().removeClass("left");	
							
							var  list=$("#scroll_pic_nav li");
							for(var k=0;k<list.length;k++){
								if(k<this.currPageX)
									$(list[k]).addClass("left");
								else
									$(list[k]).removeClass("left");
							}												
						}
					});
					//
					var nav_lis = new Array(lis.length);
					d.write('<li class="on"><span>1</span></li>');
					for(var i=1; i<nav_lis.length; i++){										
						d.write("<li><span>"+(i+1)+"</span></li>");				
					}
				})(document, $);
			</script>
		</ol>
	</div>
</header>
	<section class="section_body">
		<ul class="list_article">
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512588&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>1、国贸线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512592&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>2、安贞医院线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512593&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>3、健德桥线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512594&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>4、三义庙线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512596&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>5、燕山线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512597&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>6、广渠门线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512610&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>7、静安庄线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512612&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>8、瀛海线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512614&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>9、清河线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512619&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>10、石景山线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512620&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>11、旧宫线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512621&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>12、大兴线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512626&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>13、马驹桥线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512627&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>14、通州线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512629&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>15、次渠线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512630&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>16、望京线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512633&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>17、卢沟桥线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512634&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>18、经海线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1512635&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160317094915_35211.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>19、采育线</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1802367&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20160408151205_40208.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>20、地铁摆渡车</h3>
						<p></p>
					</div>
				</a>
			</li>
					<li>
										<a href="/weisite/list?pid=55600086&bid=56315020&wechatid=fromUsername&ltid=1632883&wxref=mp.weixin.qq.com"
					 class="tbox">
					<div>
						<span><img src="/drivingSchool/Public/route/images/20151208142054_56599.jpg" /></span>
					</div>
					<div class="article_summary">
						<h3>21、乘坐公共交通来校指南</h3>
						<p></p>
					</div>
				</a>
			</li>
				</ul>
	</section>
</div>
<!--
导航菜单
   后台设置的快捷菜单
-->
			<link href="/drivingSchool/Public/route/css/nav5.css" rel="stylesheet" />
		<section data-role="widget" data-widget="nav5" class="nav5">
			<div class="plug-div">
				<div id="plug-phone" class="plug-phone">
										<input type="checkbox" id="plug-btn" class="plug-menu" style="background-color:#B70000;" />
											<div style="background-color:#B70000; ">
															<a href="tel:010-83701668" class="icon-phone"></a>
													</div>
									</div>
			</div>
		</section>
		<script>
			window.addEventListener("DOMContentLoaded", function(){
				btn = document.getElementById("plug-btn");
				btn.onclick = function(){
					var divs = document.getElementById("plug-phone").querySelectorAll("div");
					var className = className=this.checked?"on":"";
					for(i = 0;i<divs.length; i++){
						divs[i].className = className;
					}
					document.getElementById("plug-wrap").style.display = "on" == className? "block":"none";
				}
			}, false);
		</script>
	
<!--
分享前控制
-->
	<script type="text/javascript">
		
		window.shareData = {
			"imgUrl": "http://img.weimob.com/static/41/1c/1e/image/20160120/20160120160711_96160.jpg",
			"timeLineLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"sendFriendLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"weiboLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
			"tTitle": "Hi，您来了~",
			"tContent": "欢迎您来参观！",
			"fTitle": "Hi，您来了~",
			"fContent": "欢迎您来参观！",
			"wContent": "欢迎您来参观！"
		};
			</script>

    <script>
            window.shareData = {
            "imgUrl": "http://img.weimob.com/static/41/1c/1e/image/20160120/20160120160711_96160.jpg",
            "timeLineLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
            "sendFriendLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
            "weiboLink": "http://55600086.m.weimob.com/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com",
            "tTitle": "Hi，您来了~",
            "tContent": "欢迎您来参观！",
            "fTitle": "Hi，您来了~",
            "fContent": "欢迎您来参观！",
            "wContent": "欢迎您来参观！",
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
        			<footer style="overflow:visible;">
				<div class="weimob-copyright">
											<a href="/weisite/home?pid=55600086&bid=56315020&wechatid=fromUsername&wxref=mp.weixin.qq.com" style="color:#B70000!important">© 北京市公交驾校</a>
									</div>
			</footer>
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
		"timeLineLink": "http://55600086.m.weimob.com/weisite/channel?pid=55600086&bid=56315020&wechatid=fromUsername&categoryid=1512586&wxref=mp.weixin.qq.com&_tt=2&channel=menu%5E%23%5E54+t6L2m57q%2F6Lev",
	"sendFriendLink": "http://55600086.m.weimob.com/weisite/channel?pid=55600086&bid=56315020&wechatid=fromUsername&categoryid=1512586&wxref=mp.weixin.qq.com&_tt=2&channel=menu%5E%23%5E54+t6L2m57q%2F6Lev",
	"weiboLink": "http://55600086.m.weimob.com/weisite/channel?pid=55600086&bid=56315020&wechatid=fromUsername&categoryid=1512586&wxref=mp.weixin.qq.com&_tt=2&channel=menu%5E%23%5E54+t6L2m57q%2F6Lev",
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
<script type="text/javascript" src="/drivingSchool/Public/route/js/chatfloat.js"></script>
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
<script type="text/javascript" src="/drivingSchool/Public/route/js/share_channel.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/base64.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/st.js"></script>
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
<script type="text/javascript" src="/drivingSchool/Public/route/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="/drivingSchool/Public/route/js/weixin.js"></script>
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