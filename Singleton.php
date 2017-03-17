<?php

# 单例模式

class Singleton {
	private static $Singleton = '';

	# 不能通过new来创建对象
	private function __construct() {

	}

	# 外部统一获取对象入口
	public static function GetSingleton() {
		if( is_null(self::$Singleton) || isset(self::$Singleton) ) {
			self::$Singleton = new self();
		}
		return self::$Singleton;
	}

	public function dosomething1() {
		echo "I'm doing some things now...\n";
	}

	private function dosomething2() {
		echo "I'm doing some important things now ...\n";
	}
}

$singleton = Singleton::GetSingleton();
$singleton->dosomething1();
