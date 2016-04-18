<?php

$appid = "wx7172256529f9d0c2";
$appsecret = "43fc13371496f3ba3f10b1bdd891c16f";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);

$access_token = $jsoninfo["access_token"];


$jsonmenu = 
'{
      
    "button": [
        {
            "name": "驾校指南", 
            "sub_button": 
            [ 
                {
                    "type": "click", 
                    "name": "学车须知", 
                    "key": "studycar"
                }, 
                {
                    "type": "click", 
                    "name": "驾校简介", 
                    "key": "knowlege"
                },
                {
                    "type":"location_select",
                    "name":"发送位置",
                    "key":"position"
                }

            ]
        }, 
        {
            "name": "学车须知", 
            "sub_button": [
                {
                    "type": "click", 
                    "name": "手机官网", 
                    "key": "phone"
                }, 
                {
                    "type": "click", 
                    "name": "班型介绍", 
                    "key": "class"
                }, 
                {
                    "type": "click", 
                    "name": "约考流程", 
                    "key": "test"
                }, 
                {
                    "type": "click", 
                    "name": "在线报名", 
                    "key": "online"
                }, 
                {
                    "type": "click", 
                    "name": "班车路线", 
                    "key": "route"
                }
            ]
        }, 
        {
            "name": "驾校活动", 
            "sub_button": [
                {
                    "type": "click", 
                    "name": "约惠春天", 
                    "key": "mitting"
                },
                 {
                    "type": "pic_sysphoto", 
                    "name": "系统拍照发图", 
                    "key": "photo"
                }
            ]
        }
    ]

 }';
   


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
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

?>