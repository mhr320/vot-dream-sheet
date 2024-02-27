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
		
		$user = $this->load_model('Seniority_model');

		$rank = $user->getSenRank($_SESSION['USER']->ois);

		echo $this->view('profile',[
			'place' => $rank,
		]);
	}
}