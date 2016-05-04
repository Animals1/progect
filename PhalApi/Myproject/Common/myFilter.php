<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/22
 * Time: 13:16
 */
//写好了一个类  签名验证服务类
class Common_MyFilter implements PhalApi_Filter
{
    public function check()
    {
        if(DI()->request->get('sign')!='')
        {
            throw new PhalApi_Exception_BadRequest(T('签名验证错误，在myFilter.php文件中'), 6);
        }
    }
}
