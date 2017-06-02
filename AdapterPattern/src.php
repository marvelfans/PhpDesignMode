<?php
// 内部员工系统
class Inner {
	private $userName = NULL;
	private $mobileNumber = NULL;
	private $jobPosition = NULL;
	private $officeNumber = NULL;
	private $homeAddress = NULL;
	private $homeTellNumber = NULL;

	public function setter($param) {
		$this->userName = $param['userName'];
		$this->mobileNumber = $param['mobileNumber'];
		$this->jobPosition = $param['jobPosition'];
		$this->officeNumber = $param['officeNumber'];
		$this->homeAddress = $param['homeAddress'];
		$this->homeTellNumber = $param['homeTellNumber'];
	}
	public function getUserName() {
		return $this->userName;
	}
	public function getMobileNumber() {
		return $this->mobileNumber;
	}
	public function getJobPosition() {
		return $this->jobPosition;
	}
	public function getOfficeNumber() {
		return $this->officeNumber;
	}
	public function getHomeAddress() {
		return $this->homeAddress;
	}
	public function getHomeTellNumber() {
		return $this->homeTellNumber;
	}
	public function showUserInfo() {
		echo "userName: " . $this->getUserName() . "\n";
		echo "mobileNumber: " . $this->getMobileNumber() . "\n";
		echo "jobPosition: " . $this->getJobPosition() . "\n";
		echo "officeNumber: " . $this->getOfficeNumber() . "\n";
		echo "homeAddress: " . $this->getHomeAddress() . "\n";
		echo "homeTellNumber: " . $this->getHomeTellNumber() . "\n";
		echo "----------\n";
	}
}
// 外部员工系统
class Outter {
	private $userBaseInfo = NULL;
	private $userOfficeInfo = NULL;
	private $userHomeInfo = NULL;
	private $cnt = 0;
	private static $idx = 0;

	public function setter($param) {
		if($this->userBaseInfo === NULL) {
			$this->userBaseInfo = array();
		}
		if($this->userOfficeInfo === NULL) {
			$this->userOfficeInfo = array();
		}
		if($this->userHomeInfo === NULL) {
			$this->userHomeInfo = array();
		}
		$p1 = array(
			'userName' => $param['userName'],
			'mobileNumber' => $param['mobileNumber'],
		);
		$p2 = array(
			'officeNumber' => $param['officeNumber'],
			'jobPosition' => $param['jobPosition'],
		);
		$p3 = array(
			'homeTellNumber' => $param['homeTellNumber'],
			'homeAddress' => $param['homeAddress'],
		);
		array_push($this->userBaseInfo, $p1);
		array_push($this->userOfficeInfo, $p2);
		array_push($this->userHomeInfo, $p3);
		$this->cnt += 1;
	}
	public function get() {
		if(self::$idx >= $this->cnt) return false;
		$p = array(
			'userName' 			=> $this->userBaseInfo[self::$idx]['userName'],
			'mobileNumber' 		=> $this->userBaseInfo[self::$idx]['mobileNumber'],
			'jobPosition' 		=> $this->userOfficeInfo[self::$idx]['jobPosition'],
			'officeNumber' 		=> $this->userOfficeInfo[self::$idx]['officeNumber'],
			'homeAddress' 		=> $this->userHomeInfo[self::$idx]['homeAddress'],
			'homeTellNumber' 	=> $this->userHomeInfo[self::$idx]['homeTellNumber'],
		);
		self::$idx += 1;
		return $p;
	}
}
// 适配器，读取外部系统数据，适配到内部系统
class Adapter {
	public function adapter_new($param) {
		$inner = new Inner();
		$inner->setter($param);
		return $inner;
	}
}
// 客户端
class Client {
	private $inner = NULL;
	public $outter = NULL;

	// 初始化外部类 和 内部类
	public function initialize() {
		$this->inner = array();
		$this->outter = new Outter();
		if(($handleInner = fopen('./inner.txt', 'r')) === false) die('Open inner.txt failed!\n');
		if(($handleOutter = fopen('./outter.txt', 'r')) === false) die('Open outter.txt failed!\n');
		while(!feof($handleInner)) {
			$line = fgets($handleInner);
			if(empty($line)) continue;
			$arr = explode("\t", $line);
			$p = array(
				'userName' 			=> $arr[0],
				'mobileNumber' 		=> $arr[1],
				'jobPosition' 		=> $arr[2],
				'officeNumber' 		=> $arr[3],
				'homeAddress' 		=> $arr[4],
				'homeTellNumber' 	=> $arr[5],
			);
			$obj = new Inner();
			$obj->setter($p);
			array_push($this->inner, $obj);
		}
		while(!feof($handleOutter)) {
			$line = fgets($handleOutter);
			if(empty($line)) continue;
			$arr = explode("\t", $line);
			$p = array(
				'userName' 			=> $arr[0],
				'mobileNumber' 		=> $arr[1],
				'jobPosition' 		=> $arr[2],
				'officeNumber' 		=> $arr[3],
				'homeAddress' 		=> $arr[4],
				'homeTellNumber' 	=> $arr[5],
			);
			$this->outter->setter($p);
		}
		fclose($handleInner);
		fclose($handleOutter);
	}
	public function run() {
		$this->initialize();
		$cnt = 0;
		while(($p = $this->outter->get()) !== false) {
			$cnt += 1;
			if($cnt > 100) die("[line:" . __LINE__ . "] dead loop occur!\n");
			// 调用适配器类，使两部分结合在一起
			array_push($this->inner, (new Adapter())->adapter_new($p));
		}
		foreach($this->inner as $obj) {
			$obj->showUserInfo();
		}
	}
}
// --- main ---
$client = new Client();
$client->run();
