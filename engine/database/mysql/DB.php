<?php


class DB
{
	public $obj;
	public $query;
	public $table_name;
	
	function __construct($obj)
	{
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


	public function Execute()
	{
		echo $this->query;
	}



}