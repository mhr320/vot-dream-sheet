<?php

/**
 * 
 */
class Vot_model extends Model
{
	protected $table = 'vot';

	protected $allowedColumns = [
			'shift',
			'date',
			'ois',
		];

	public function whereVOT($column, $value, $orderby = 'desc')
	{
		$query = addslashes($column);

		$query = "select id,date,shift,ois,shift_del from $this->table where $column = :value order by date $orderby"; 
		
		$data = $this->query($query,['value'=>$value,]);

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

	public function validate($DATA)
	{

		$this->errors = array();

		$vol = new Vot_model();
		$rows = $vol->whereVOT('ois',$_SESSION['USER']->ois,'asc');

		//check rdo selected
		// if (isset($_POST["rdos"])) {
		//     if (!filter_input(INPUT_POST, "rdos") === false) {
		//     	$days = explode("-",$_POST['rdos']);
		//     	// show($days);
		//     } else {
		//         $errors['rdos'] = "RDO was not selected";
		//     }
		// }
		//check month selected
		// if (isset($_POST["months"])) {
		//     if (!filter_input(INPUT_POST, "months") === false) {
		// 		$rdos = get_rdos_only($days,$_POST['months']);
		//     } else {
		//         $errors['month'] = "Month was not selected";
		//     }
		// }
		//check for shift 
		// if (isset($_POST["shift"])) {
		//     if (!filter_input(INPUT_POST, "shift") === false) {
		//     	$vot['shift'] 	=	$_POST['shift'];
		//     } else {
		//         $errors['shifts'] = "Shift was not selected";
		//     }
		// }
		//check for vot selected 
		// if (isset($_POST["votday"])) {

		//     if (!filter_input(INPUT_POST, "votday") === false) {
		// 		$vot['date'] 	= 	$_POST['votday'];
		// 		$vot['ois'] 	= 	strtolower($_SESSION['USER']->ois);
		//     } else {
		//         $errors['month'] = "Date was not selected";
		//     }
		// }
		
		
		//check if shift exists 
			foreach($rows as $key => $val){

				if($DATA['shift'] == $val->shift && $DATA['ois'] == $val->ois && $DATA['date'] == $val->date && $val->shift_del == 0){

					$this->errors['exists'] = "You have already volunteered for that shift!";
				}
			}

		//check if shift chosen 
			$shifts = ['am', 'pm', 'mid', 'ampm', 'pmm', 'amm', 'all_shifts'];

			if(empty($DATA['shift']) || !in_array($DATA['shift'], $shifts))
			{
				$this->errors['shift'] = "You did not pick shift. Try Again!";
			}

		//check for date 
			$dates = explode('-',$DATA['date']);
			$year = $dates[0];
			$month = $dates[1];
			$day = $dates[2];

			if(!checkdate((int)$month,(int)$day,(int)$year))
			{
				$this->errors['date'] = "You did not pick date. Try Again!";
			}

		
		if(count($this->errors) == 0)
		{	
			return true;
		}

		return false;


	}


	public function del_without_delete($id = null, $data) {

		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .= $key . "=:" . $key . ",";
		}
		$str = trim($str, ",");
		$data['id'] = $id;


		$query = "update $this->table set $str where id = :id";
		//run functions before insert
		if(property_exists($this, 'beforeInsert'))
		{
			foreach($this->beforeInsert as $func)
			{
				$data = $this->$func($data);
			}
			// echo $query;
			// show($data,$d="Data from beforeInsert");
		}
		return $this->query($query, $data);

	}

}