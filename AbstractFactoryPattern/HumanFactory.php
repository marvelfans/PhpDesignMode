<?php
require_once('Human.php');

abstract class AHumanFactory {
	public function createHuman($humanStr) {
		$human = NULL;
		try {
			$class = new ReflectionClass($humanStr);
			$human = $class->newInstance();		// $human = $class->newInstanceArgs(array()); 有参数的
		} catch(Exception $e) {
			echo $e->getMessage();
			exit;
		}
		return $human;
	}
}

class MaleHumanFactory extends AHumanFactory {
}

class FemaleHumanFactory extends AHumanFactory {
}
