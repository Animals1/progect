<?php 
/****
	微信开发  纯文本回复
****/
	//接受用户发送的消息
	$postData = $GLOBALS["HTTP_RAW_POST_DATA"];
	$obj_xml=simplexml_load_string($postData, 'SimpleXMLElement', LIBXML_NOCDATA);
	$json=json_encode($obj_xml);
	$post_obj=json_decode($json);
	var_dump($post_obj);



?>