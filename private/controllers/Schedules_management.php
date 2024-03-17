<?php
/**
 * Schedules_management controller
 */
class Schedules_management extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

	$schedules = new Schedules_model;

	// $file = ASSETS."/trimester_3.csv";

	// $csv = transferCSV($file);

	// foreach ( $csv as $v ) {
	// 	$arr = ["mid_drop"=>$v['mid_drop'],"grp"=>$v['grp'],"schedule"=>$v['schedule'],"ois"=>$v['ois']];
	// 	$schedules->insertTri(3, $arr);
	// }

	$schedule1 	= $schedules->scheduleFindAll(1);
	$schedule2 	= $schedules->scheduleFindAll(2);
	$schedule3 	= $schedules->scheduleFindAll(3);
		
		echo $this->view('schedules_management', [
			'schedules1'=>$schedule1,
			'schedules2'=>$schedule2,
			'schedules3'=>$schedule3,
		]);
	}
}