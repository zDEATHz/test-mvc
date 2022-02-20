<?php

Abstract class Model {
	//protected $db = null;
	
	protected $db;
	protected $table;
	private $dataResult;

	
	public function __construct($select = false) {
		// объект бд коннекта
		global $dbObject;
		$this->db = $dbObject;
		
		// имя таблицы
		$modelName = get_class($this);
		$arrExp = explode('_', $modelName);
		$tableName = strtolower($arrExp[0]);
		$this->table = $tableName;
	}
	
	function getRowById($id){
		
		try{
			$db = $this->db;
			
			$stmt = $db->prepare("SELECT * FROM `$this->table` WHERE `id` = ?");
			$stmt->execute([$id]);
			
			$row = $stmt->fetch();
		}catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}
		return $row;
	}
	
	// Все записи с базы
	function getRows($select = false){
		$sql = $this->_getSelect($select);
		return $this->_getResult("SELECT * FROM $this->table" . $sql);
	}
	
	// получить число записей в базе
	function getCount(){
		try{
			$db = $this->db;
			
			$stmt = $db->query("SELECT COUNT(*) FROM $this->table");
			$row = $stmt->fetch();
		}catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}
		return $row[0];
	}
	
	// составление запроса к базе данных
	private function _getSelect($select) {
		if(is_array($select)){
			$allQuery = array_keys($select);
			array_walk($allQuery, function(&$val){
				$val = strtoupper($val);
			});
			
			$querySql = "";
			if(in_array("WHERE", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "WHERE"){
						$querySql .= " WHERE " . $val;					
					}
				}
			}
			
			if(in_array("GROUP", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "GROUP"){
						$querySql .= " GROUP BY " . $val;					
					}
				}
			}
			
			if(in_array("ORDER", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "ORDER"){
						$querySql .= " ORDER BY " . $val;					
					}
				}
			}
			
			if(in_array("LIMIT", $allQuery)){
				foreach($select as $key => $val){
					if(strtoupper($key) == "LIMIT"){
						$querySql .= " LIMIT " . $val;					
					}
				}
			}
			
			return $querySql;
		}		
		return false;
	}
	
	// выполнение запроса к базе данных
	private function _getResult($sql){
		try{
			$db = $this->db;
			$stmt = $db->query($sql);
			$rows = $stmt->fetchAll();
			$this->dataResult = $rows;
		}catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}
		
		return $rows;
	}
	
	// запись в базу данных
	public function save() {
		$arrayAllFields = array_keys($this->fieldsTable());
		$arraySetFields = array();
		$arrayData = array();
		foreach($arrayAllFields as $field){
			if(!empty($this->$field)){
				$arraySetFields[] = $field;
				$arrayData[] = $this->$field;
			}
		}
		$forQueryFields =  implode(', ', $arraySetFields);
		$rangePlace = array_fill(0, count($arraySetFields), '?');
		$forQueryPlace = implode(', ', $rangePlace);
		
		try {
			$db = $this->db;
			$stmt = $db->prepare("INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)");  
			$result = $stmt->execute($arrayData);
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			echo '<br/>Error sql : ' . "'INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)'"; 
			exit();
		}
		
		return $result;
	}
	
	// обновление записи. Происходит по ID
	public function update(){
		$arrayAllFields = array_keys($this->fieldsTable());
		
		$arrayForSet = array();
		foreach($arrayAllFields as $field){

			//if((!empty($this->$field)) || $this->$field == 0){
			if(isset($this->$field)){
				if(strtoupper($field) != 'ID'){
					
					$arrayForSet[] = $field . ' = "' . $this->$field . '"';
				}else{
					$whereID = $this->$field;
				}
			}
		}
		
		if(!isset($arrayForSet) OR empty($arrayForSet)){
			echo "Array data table `$this->table` empty!";
			exit;
		}
		if(!isset($whereID) OR empty($whereID)){
			echo "ID table `$this->table` not found!";
			exit;
		}
		
		$strForSet = implode(', ', $arrayForSet);
		
		try {
			$db = $this->db;
			$stmt = $db->prepare("UPDATE $this->table SET $strForSet WHERE `id` = $whereID");  
			$result = $stmt->execute();
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			echo '<br/>Error sql : ' . "'UPDATE $this->table SET $strForSet WHERE `id` = $whereID'"; 
			exit();
		}
		return $result;
	}
	
	
}