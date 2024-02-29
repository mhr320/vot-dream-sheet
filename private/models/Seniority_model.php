<?php

/**
 * Seniority model, functions relative to specific table
 */
class Seniority_model extends Model
{
	public $table = "seniority";

	protected $beforeInsert = [
		'hash_password'
	];

	public function validate($DATA)
	{

		$this->errors = array();


		//check for First Name
		if(empty($DATA['fnom']) || !preg_match('/^[a-zA-Z]+$/',$DATA['fnom']))
		{
			$this->errors['fnom'] = "Only letters allowed in First Name";
		}

		//check for Last Name
		if(empty($DATA['lnom']) || !preg_match('/^[a-zA-Z]+$/',$DATA['lnom']))
		{
			$this->errors['lnom'] = "Only letters allowed in Last Name";
		}

		//check for Last Name
		if(empty($DATA['ois']) || !preg_match('/^[a-zA-Z]+$/',$DATA['ois']))
		{
			$this->errors['ois'] = "Only 2 letters allowed in Operating Initials";
		}

		//check if email exists
		if($this->where('email', $DATA['email']))
		{
			$this->errors['email'] = "That Email is already in use";
		}

		//check for Email
		if(empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}

		//check for Passwords
		if(empty($DATA['pwd']) || $DATA['pwd'] != $DATA['pwd2'])
		{
			$this->errors['pwd'] = "The passwords do not match";
		}

		//check for Password length
		if(strlen($DATA['pwd']) < 8)
		{
			$this->errors['pwd'] = "Password must be at least 8 Characters";
		}

		//check for shift chosen
		$shifts = ['am', 'pm', 'mid', 'ampm', 'pmm', 'amm', 'all_shifts'];

		if(empty($DATA['shift']) || !in_array($DATA['shift'], $shifts))
		{
			$this->errors['shift'] = "You must choose a shift";
		}

		//check for Title
		$roles = ['cpc', 'developmental', 'admin', 'super_admin'];

		if(empty($DATA['role']) || !in_array($DATA['role'], $roles))
		{
			$this->errors['role'] = "Title is not valid";
		}

		if(count($this->errors) == 0)
		{
			return true;
		}

		return false;
	}

	public function seniorityList($rot='')
	{
		$query = "select * from $this->table order by cbu asc, nbu asc, eod asc, rot $rot";

		$data = $this->query($query);

		if(is_array($data))
		{
			foreach($data as $row)
			{
				$row->cbu = date('j M Y', strtotime($row->cbu));
				$row->nbu = date('j M Y', strtotime($row->nbu));
				$row->eod = date('j M Y', strtotime($row->eod));
				$row->scd = date('j M Y', strtotime($row->scd));
			}
		}

		return $data;
	}

	public function getSenRank($ois) 
	{
		$rot = checkOddEven(idate('Y'));

		$i = 0;

		$all = $this->seniorityList($rot);

		foreach($all as $rank)
		{
			++$i;

			if($rank->ois == $ois)
			{
				return $i;
			}
		}
	}

	public function hash_password($data)
	{
		$data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

		return $data;
	}
}