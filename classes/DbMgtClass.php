<?php
class DbMgtClass
{
	private $setting = array();

	public function __construct(
		$dbaddress = "localhost",
		$dbuser = "root",
		$dbpass = "",
		$dbname = "inventory_db"
	) {
		$this->setting['dbaddress'] = $dbaddress;
		$this->setting['dbuser'] = $dbuser;
		$this->setting['dbpass'] = $dbpass;
		$this->setting['dbname'] = $dbname;
	}

	public function ConDB()
	{
		return new mysqli(
			$this->setting['dbaddress'],
			$this->setting['dbuser'],
			$this->setting['dbpass'],
			$this->setting['dbname']
		);
	}

	public function InsertRecord($table, array $data)
	{
		$conn = $this->ConDB();
		$data_count = count($data);
		$x = 0;
		$field = $value = $separator = "";
		foreach ($data as $array_key => $array_val) {
			$x++;
			if ($x >= 2 and $x <= $data_count) {
				$separator = ",";
			}
			$field = $field . $separator . $array_key;
			$value = $value . $separator . "'" . $array_val . "'";
		}
		$sql = "insert into " . $table . " (" . $field . ") values(" . $value . ")";
		$conn->query($sql);
	}

	public function DeleteRecord($table, $condition)
	{
		$conn = $this->ConDB();
		if ($condition != "") {
			$condition = "where " . $condition;
		}
		$sql = "delete from $table $condition";
		$conn->query($sql);
		return $sql;
	}

	public function UpdateRecord($table, array $data, $condition)
	{
		$conn = $this->ConDB();
		$x = 0;
		$field = $separator = "";
		if ($condition != "") {
			$condition = "where " . $condition;
		}
		$data_count = count($data);
		foreach ($data as $array_key => $array_val) {
			$x++;
			if ($x >= 2 and $x <= $data_count) {
				$separator = ",";
			}
			$field = $field . $separator . $array_key . "='" . $array_val . "'";
		}
		$sql = "update $table set $field $condition";
		$conn->query($sql);
		return $sql;
	}

	public function FetchCol($table, $condition = "", $field)
	{
		$conn = $this->ConDB();
		if ($condition != "") {
			$condition = "where " . $condition;
		}
		$sql = "select * from $table $condition";
		$result = $conn->query($sql);
		if($result){
			$row = $result->fetch_assoc();
			$fd = $row[$field];
			return $fd;
		}else {
			return "";
		}
		
	}

	public function FetchRow($table, $condition = "")
	{
		$conn = $this->ConDB();
		if ($condition != "") {
			$condition = "where " . $condition;
		}
		$sql = "select * from $table $condition";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	public function FetchRows($table, $condition = "")
	{
		$conn = $this->ConDB();
		if ($condition != "") {
			$condition = "where " . $condition;
		}
		$sql = "select * from $table $condition";
		$result = $conn->query($sql);
		$all_rows = $result->fetch_all(MYSQLI_ASSOC);
		return $all_rows;
	}

	public function CountRows($sql)
	{
		$conn = $this->ConDB();
		$result = $conn->query($sql);
		$rows_count = $result->num_rows;
		return $rows_count;
	}
}
