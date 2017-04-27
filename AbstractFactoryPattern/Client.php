<?php
require_once('HumanFactory.php');

class Client {
	private $_humanStr = NULL;

	public function __construct() {
		$this->_humanStr = array(
			'blackmale' => 'BlackMaleHuman',
			'whitemale' => 'WhiteMaleHuman',
			'yellowmale' => 'YellowMaleHuman',
			'blackfemale' => 'BlackFemaleHuman',
			'whitefemale' => 'WhiteFemaleHuman',
			'yellowfemale' => 'YellowFemaleHuman',
		);
	}

	public function getHumanClassName($humanStr) {
		return isset($this->_humanStr[$humanStr]) ? $this->_humanStr[$humanStr] : false;
	}

	public function run() {
		// 获取用户输入,生成对应的人种
		while(true) 
		{
			$str = fgets(STDIN, 8192);
			if(strtolower(trim($str)) === 'exit')
			{
				die("Progress is over!\n");
			}
			$humanStr = $this->getHumanClassName(strtolower(trim($str)));
			if( $humanStr === false ) 
			{
				echo "Please check your input!\n";
				continue;
			}
			$human = NULL;
			if( strpos(strtolower($humanStr), 'male') !== false ) 
			{
				$maleHumanFactory = new MaleHumanFactory();
				$human = $maleHumanFactory->createHuman($humanStr);
			} else {
				$femaleHumanFactory = new FemaleHumanFactory();
				$human = $femaleHumanFactory->createHuman($humanStr);
			}
			if( $human === NULL ) 
			{
				echo "Create human failed!\n";
			} else {
				$human->laugh();
				$human->cry();
				$human->talk();
				$human->sex();
			}
		}
	}
}

$client = new Client();
$client->run();
