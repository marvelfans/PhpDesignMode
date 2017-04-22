<?php

require_once('GamePlayerProxy.php');

class Client {
	public function run() {
		$gamePlayerProxy = new GamePlayerProxy("张三");
		$gamePlayerProxy->login("赵四", '123456');
		$gamePlayerProxy->killBoss();
		$gamePlayerProxy->upgrade();
	}
}


$client = new Client();
$client->run();
