<?php
/**
 * 默认接口服务类
 *
 * @author: dogstar <chanzonghuang@gmail.com> 2014-10-04
 */

class Api_Default extends PhalApi_Api {

	public function getRules() {
        return array(
            'index' => array(
                'username' 	=> array('name' => 'username', 'default' => 'PHPer', ),
            ),
        );
	}
	
	/**
	 * 默认接口服务
	 * @return string title 标题
	 * @return string content 内容
	 * @return string version 版本，格式：X.X.X
	 * @return int time 当前时间戳
	 */
	public function index() {
        return array(
            'title' => 'Hello World!',
            'content' => T('Hi {name}, welcome to use PhalApi!', array('name' => $this->username)),
            'version' => PHALAPI_VERSION,
            'time' => $_SERVER['REQUEST_TIME'],
        );
	}

	//渲染view视图页面
	public function show() {
		$output = array();
		$output['test'] = '标题';
		$output['list'] = array(
			array(
				'name' => '张三',
				'age' => '15',
			),
			array(
				'name' => '李四',
				'age' => '22',
			),
			array(
				'name' => '王五',
				'age' => '35',
			),
		);

		// 我们现在需要做的事情是在模板中使用，我们先需要在Demo/View/Default中新建一个index.htm的文件
		// 然后把模板文件引入进来，然后将output这个数组放在第二个参数,这里会将数组键名作为变量名，如果有冲突，则覆盖已有的变量

		DI()->view->show('show', $output);
	}
}
