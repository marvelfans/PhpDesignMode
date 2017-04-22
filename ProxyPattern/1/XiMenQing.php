<?php

require_once('WangPo.php');

// 客户端类
class XiMenQing {
	public function run() {
		$wangpo = new WangPo(new PanJinLian());
		$wangpo->makeEyesWithMan();
		$wangpo->happyWithMan();


		$wangpo = new WangPo(new JiaShi());
		$wangpo->makeEyesWithMan();
		$wangpo->happyWithMan();
	}
}

// main
$ximenqing = new XiMenQing();
$ximenqing->run();
