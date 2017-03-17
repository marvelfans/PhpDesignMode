<?php

# 单例模式

class Singleton {
	private static $_instance = NULL;

	# 不能通过new来创建对象
	private function __construct() {

	}

	# 外部统一获取对象入口
	public static function getInstance() {
		if( !(self::$_instance instanceof self) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function dosomething1() {
		echo "I'm doing some things now...\n";
	}

	private function dosomething2() {
		echo "I'm doing some important things now ...\n";
	}
}

$singleton = Singleton::getInstance();
$singleton->dosomething1();
