<?php
include_once 'Human.php';

abstract class AbstractHumanFactory {
	public abstract function createHuman($HumanStr);
}

class HumanFactory extends AbstractHumanFactory {
	public function createHuman($HumanStr) {
		$human = NULL;
		try {
			$class = new ReflectionClass($HumanStr);
			$human = $class->newInstance();		// $human = $class->newInstanceArgs(array()); 有参数的
		} catch(Exception $e) {
			echo $e->getMessage();
			exit;
		}
		return $human;
	}
}
