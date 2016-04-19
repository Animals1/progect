<?php

namespace Home\Controller;
use Think\Controller;

class PayController extends Controller 
{
	//渲染微信支付页面
	public function payindex()
	{
		$this->display('index');
	}
	//微信支付 
	public function pay()
	{
		include_once("__PUBLIC__/WxPayPubHelper/WxPayHelper.php");


		$commonUtil = new CommonUtil();
		$wxPayHelper = new WxPayHelper();


		$wxPayHelper->setParameter("bank_type", "WX");
		$wxPayHelper->setParameter("body", "test");
		$wxPayHelper->setParameter("partner", "1900000109");
		$wxPayHelper->setParameter("out_trade_no", $commonUtil->create_noncestr());
		$wxPayHelper->setParameter("total_fee", "1");
		$wxPayHelper->setParameter("fee_type", "1");
		$wxPayHelper->setParameter("notify_url", "htttp://www.baidu.com");
		$wxPayHelper->setParameter("spbill_create_ip", "127.0.0.1");
		$wxPayHelper->setParameter("input_charset", "GBK");
	}
}
		


?>