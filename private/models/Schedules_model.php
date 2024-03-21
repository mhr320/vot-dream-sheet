<?php
/**
 * 
 */
class Schedules_model extends Model
{
	public $table 		= '';
	public $table1 	= 'trimester_1';
	public $table2 	= 'trimester_2';
	public $table3 	= 'trimester_3';

	public $allowColumns = [
		'ois',
		'mid_drop',
		'grp',
		'schedule',
	];

	// protected $beforeInsert = [
	// 	'prepareCSV'
	// ];

	public function scheduleFindAll($tablenum, $order = 'asc')
	{
		if($tablenum == 1) {
			$this->table = $this->table1;
		} elseif ($tablenum == 2){
			$this->table = $this->table2;
		} elseif ($tablenum == 3) {
			$this->table = $this->table3;
		}
		$query 	= "select * from $this->table order by grp $order";
		$data 		=  $this->query($query);
		//run functions after select
		if(is_array($data))
		{
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$data = $this->$func($data);
				}
			}
		}
		return $data;
	} 

	public function insertTri($num, $data)
	{
		$tablenum = $num;

		if ( $tablenum == 1) {
			$this->table = $this->table1;
		} elseif ($tablenum == 2){
			$this->table = $this->table2;
		} elseif ($tablenum == 3) {
			$this->table = $this->table3;
		}
		//remove unwanted columns
		if(property_exists ( $this, 'allowedColumns' ) ) {
			foreach ( $data as $key => $column ) {
				if ( !in_array($key, $this->allowedColumns ) ) {
					unset($data[$key]);
				}
			}
		}
		//run functions before insert
		if ( property_exists ( $this, 'beforeInsert' ) ) {
			foreach ( $this->beforeInsert as $func ) {
				$data = $this->$func( $data );
			}
		}
		$keys 			= array_keys($data);
		$columns 	= implode(', ', $keys);
		$values 		= implode(', :', $keys);
		$query 		= "insert into $this->table ($columns) values (:$values)";
		return $this->query($query, $data);
	}

	public function updateNormal ( $id, $data ) {
		$str = "";
		foreach ($data as $key => $value) {
			$str .= $key . "=:" . $key . ",";
		}
		$str 				= trim($str, ",");
		$data['id'] 	= $id;
		$query 		= "update $this->table1 set $str where id = :id";
		return $this->query($query, $data);
	}

	public function whereTri1OisBlank($column, $value) {
		$query 	= addslashes($column);
		$query 	= "select id from $this->table1 where $column = :value && ois is null limit 1"; 
		$data 		= $this->query($query,[
						'value'=>$value,
						]);
		return $data;
	}

	public function whereTri1OisNotBlank($column, $value) {
		$query 	= addslashes($column);
		$query = "select id from $this->table1 where $column = :value"; 
		$data 		= $this->query($query,[
						'value'=>$value,
						]);
		return $data;
	}
}