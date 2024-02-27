<?php
/**
 * Settings controller
 */
class Settings extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		if( Auth::isAdmin() || Auth::isSuper() ) {
			$this->view('settings');
		} else {
			
			$this->view('home');
		}


	}
}