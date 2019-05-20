<?php

/**
* database engine for communicate our models into mysql
*/
class DB
{
	public $obj;
	public $query;
	public $table_name;
	public $conn;
	public $q;
	
	function __construct($obj)
	{
		$this->conn = new mysqli("localhost","root","","tugas_oop");
		$this->obj = $obj;
		$this->table_name = strtolower(get_class($this->obj));
	}

	public function InsertDAO()
	{
		$table_name = $this->table_name;
		$tmp_que = "INSERT INTO $table_name VALUES (";
		$i = 1;
		foreach ($this->obj as $key => $value) {
			if ($i != count((array)$this->obj)) {
				if ($i == 1) {
					$tmp_que .= "null, ";
				}else{
					$tmp_que .= "'$value', ";					
				}
			}else{
				$tmp_que .= "'$value'";
			}

			$i++;
		}
		$tmp_que .= ")";
		
		$this->query = $tmp_que;
		return $this;
	}

	public function UpdateDAO()
	{
		$table_name = $this->table_name;
		$tmp_que = "UPDATE $table_name SET ";
		$i = 1;
		foreach ($this->obj as $key => $value) {
			if ($i != count((array)$this->obj)) {
				if ($i == 1) {
					// $tmp_que .= "null, ";
				}else{
					$tmp_que .= "$key = '$value', ";					
				}
			}else{
				$tmp_que .= "$key = '$value'";
			}

			$i++;
		}
		$tmp_que .= " WHERE id = '".$this->obj->id."'" ;
		
		$this->query = $tmp_que;
		return $this;
	}	



	public function GetALL()
	{	
		$table_name = $this->table_name;
		$q = mysqli_query($this->conn,"SELECT * FROM $table_name");
		
		$i =0;
		while ($r=mysqli_fetch_array($q)) {
			$res[$i] = new $this->obj;
			foreach ($this->obj as $key => $value) {
				$res[$i]->$key = $r[$key];
			}
			$i++; 
		}
		
		return $res;
	}

	public function find($id)
	{	
		$table_name = $this->table_name;
		$q = mysqli_query($this->conn,"SELECT * FROM $table_name WHERE id='$id'");
		$r=mysqli_fetch_array($q);
	
		$res[0] = new $this->obj;
		foreach ($this->obj as $key => $value) {
			$res[0]->$key = $r[$key];
		}
		
		return $res[0];
	}


	public function delete()
	{
		$table_name = $this->table_name;
		$id= $this->obj->id;
		$q = mysqli_query($this->conn,"DELETE FROM $table_name WHERE id='$id'");
		if ($q) {
			return true;
		}else{
			return false;
		}

	}

	public function Execute()
	{
		$this->q = mysqli_query($this->conn,$this->query);
		
		return $this;
	}
}