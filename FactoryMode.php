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
		$ClassStr = isset($args[0]) ? $args[0] : NULL;
		$args_list = count($args > 1) ? array_slice($args, 1) : NULL;
		echo $ClassStr . "\n";
		try {
			$class = empty($ClassStr) ? NULL : new ReflectionClass($ClassStr);
			$product = empty($class) ? NULL : (empty($args_list) ? $class->newInstance() : $class->newInstanceArgs($args_list()));
		} catch(Exception $e) {
			print $e->getMessage();
		}
		return $product;
	}	
}


# test
$product1 = Factory::createProduct("Product1", "phone", "999.9");
$product2 = Factory::createProduct("Product2");

$product1->method1();
$product2->method1();
