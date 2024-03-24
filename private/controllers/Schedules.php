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

	$schedules 	= 	new Schedules_model;

	$schedule1 	= 	$schedules->scheduleFindAll(1);
	$schedule2 	= 	$schedules->scheduleFindAll(2);
	$schedule3 	= 	$schedules->scheduleFindAll(3);
		
		echo $this->view('schedules', [
			'schedules1'=>$schedule1,
			'schedules2'=>$schedule2,
			'schedules3'=>$schedule3,
		]);
	}

	public function tableDataOis() {

		// $schedules 	= 	new Schedules_model;
		// $schedule1 	= 	$schedules->scheduleFindAll(1);

		// foreach( $schedule1 as $line ) {
		// 	echo $line->ois;
		// }
		echo '<?=$line->ois?>';
	}
}