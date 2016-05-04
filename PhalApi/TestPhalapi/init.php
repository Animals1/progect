<?php
/**
 * 验证版本是否需要升级
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/27
 * Time: 11:29
 */
    require_once ('./Common.php');
    require_once ('./Response.php');
    class Init extends Common
    {
        public function index()
        {
            $this->check();
            //判断版本是否需要升级
            $version = $this->versionupgrade($this->app['id']);
            if($version)
            {
                //比较版本的大小
                if($version['type'] && $this->param['version_id'] < $version['version_id'])
                {
                    $version['is_upgrade'] = $version['type'];
                }else
                {
                    $version['is_upgrade'] = 0;
                }
                return Response::show(200,'版本升级信息获取成功',$version);

            }else
            {
                return Response::show(400,'版本升级信息获取失败');
            }
        }
    }
    $init=new Init();
    $arr=$init->index();
    print_r($arr);