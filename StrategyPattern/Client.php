<?php

require_once('Context.php');

// 客户端类 执行策略
class Client {
	
	public function run() {
		echo "------刚到吴国拆第一个------\n";
		$content = new Context(new BackDoor());
		$content->operate();
		echo "\n";


		echo "------刘备乐不思蜀了，拆第二个------\n";
		$content = new Context(new GivenGreenLight());
		$content->operate();
		echo "\n";

		echo "------孙权小兵来了，拆第三个------\n";
		$content = new Context(new BlockEnemy());
		$content->operate();
		echo "\n";
	}

}


$client = new Client();
$client->run();
