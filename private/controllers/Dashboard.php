<?php
/**
 * Dashboard controller
 */
class Dashboard extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		$user = $this->load_model('Seniority_model');

		$rank = $user->getSenRank("MR");

		// checks for super_admin, admin, and C or D
		$this->checkRole('dashboard',['place' => $rank,],'home');
	}
}
