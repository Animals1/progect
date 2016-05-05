<?php
$con=mysql_connect('127.0.0.1','root','root');
if(!$con)
{
	die('失败');
}
mysql_select_db('dashuju');
$sql="select rand_string(60) my from dual";
$res=mysql_query($sql);
if($row=mysql_fetch_assoc($res))
{
	echo $row['my'];
}