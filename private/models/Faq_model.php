<?php

/**
 * Faq model
 */
class Faq_model extends Model
{
	
	protected $table = 'faq';

	function __construct()
	{
		// code...
	}

	public function faqUpdate($id, $data)
	{
		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .= $key . "=:" . $key . ",";
		}
		$str = trim($str, ",");
		$data['id'] = $id;
		$query = "update $this->table set $str where id = :id";
		
		return $this->query($query, $data);
	}
}