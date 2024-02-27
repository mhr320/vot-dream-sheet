<?php

/**
 * Votreport controller
 */
class Votreport extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$rows = new Vot_model();

		$vot = $rows->findAll();

		if(Auth::isAdmin() || Auth::isSuper()) {

			echo $this->view('votreport',['allvol'=>$vot]);
		} else {

			$this->redirect('login');
		}
	}
}