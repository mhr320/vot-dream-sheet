<?php
/**
 * Schedules controller
 */
class Schedules extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

	$schedules = new Schedules_model;

	// $file = ASSETS."/trimester_1.csv";

	// $csv = transferCSV($file);

	// foreach ( $csv as $v ) {
	// 	$arr = ["mid_drop"=>$v['mid_drop'],"grp"=>$v['grp'],"schedule"=>$v['schedule']];
	// 	$schedules->insert($arr);
	// }

	$schedule 	= $schedules->scheduleFindAll();
		
		echo $this->view('schedules', [
			'schedules'=>$schedule,
		]);
	}

}