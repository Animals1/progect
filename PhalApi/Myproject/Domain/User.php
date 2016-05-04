<?php

class Domain_User {

    public function getBaseInfo($userId) {
        $rs = array();
        //intval()  本函数可将变量转成整数类型  对接收到的值进行验证
        $userId = intval($userId);
        if ($userId <= 0) {
            return $rs;
        }

		// 版本1：简单的获取   调用model层
        $model = new Model_User();
        $rs = $model->getByUserId($userId);

		// 版本2：使用单点缓存/多级缓存 (应该移至Model层中)
		/**
        $model = new Model_User();
        $rs = $model->getByUserIdWithCache($userId);
		*/

		// 版本3：缓存 + 代理
		/**
		$query = new PhalApi_ModelQuery();
		$query->id = $userId;
		$modelProxy = new ModelProxy_UserBaseInfo();
		$rs = $modelProxy->getData($query);
		*/

        return $rs;
    }
}
