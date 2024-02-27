<?php
/**
 * Suggestions controller
 */
class Suggestions extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		
		echo $this->view('suggestions');
	}
}