<?php

# 工厂模式

class Product1 {
	private $name = NULL;
	private $price = NULL;

	public function __construct($name = '', $price = '') {
		$this->name = $name;
		$this->price = $price;
	}

	public function method1() {
		echo "Name: $this->name\n";
		echo "Price: $this->price\n";
	}

	private function method2() {
		echo "I'm do something import now ...\n";
	}
}

class Product2 {
	private static $_instance = NULL;

	private function __construct() {

	}

	public static function getInstance() {
		if( !(self::$_instance instanceof self) ) {
			$_instance = new self();
		}
		return $_instance;
	}

	public function method1() {
		echo "Create Product2 success!\n";
	}
}

class Factory {
	
	# <args> 0:要创建的对象名称 1... 构建对象需要的参数
	public static function createProduct() {
		$product = NULL;
		$args = func_get_args();
		$ClassStr = array_shift($args);
		try {
			$class = empty($ClassStr) ? NULL : new ReflectionClass($ClassStr);
			$product = empty($class) ? NULL : $class->newInstanceArgs($args);
		} catch(Exception $e) {
			print $e->getMessage();
		}
		return $product;
	}	
}


# test
$product1 = Factory::createProduct("Product1", "phone", "999.9");
// $product2 = Factory::createProduct("Product2");

$product1->method1();
// $product2->method1();

# 工厂方法创建单例时，需要单独去创建，使用 Reflectionclass 和 newinstanceargs 不能创建单例对象


