<?php
/**
 * 
 */
class Schedules_model extends Model
{
	public $table = 'trimester_1';

	public function scheduleFindAll($order = 'asc')
	{

		$query = "select * from $this->table order by grp $order";

		$data =  $this->query($query);

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
}