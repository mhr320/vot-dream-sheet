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

		$schedule = new Schedules_model;

		if ( count ( $_POST ) > 0 ) {

			if ( $_POST [ 'nullTriOis1' ] == 1) {
				$schedule->nullTrimesterOis(1);
			} elseif ( $_POST [ 'nullTriOis2' ] == 2 ) {
				$schedule->nullTrimesterOis(2);
			} elseif ( $_POST [ 'nullTriOis3' ] == 3 ) {
				$schedule->nullTrimesterOis(3);
			}
		}


	}
}