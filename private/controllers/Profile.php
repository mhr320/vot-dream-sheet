<?php
/**
 * Profile controller
 */
class Profile extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$schedules = new Schedules_model;

		$schedule1 	= $schedules->scheduleFindAll(1);
		$schedule2 	= $schedules->scheduleFindAll(2);
		$schedule3 	= $schedules->scheduleFindAll(3);
		
		$user = $this->load_model('Seniority_model');

		$rank = $user->getSenRank($_SESSION['USER']->ois);

		echo $this->view('profile',[
			'place' => $rank,
			'schedules1'=>$schedule1,
			'schedules2'=>$schedule2,
			'schedules3'=>$schedule3,
		]);
	}
}