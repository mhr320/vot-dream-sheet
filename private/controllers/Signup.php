<?php
/**
 * signup controller
 */
class Signup extends Controller
{
	
	function index()
	{

		// mr_print_r($_POST);

		$mode = isset($_GET['mode']) ? $_GET['mode'] : ''; // Needs changing?????

		$errors = array();

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		if(count($_POST) > 0)
		{
			$user = new Seniority_model();

			if($user->validate($_POST))
			{
				
				$_POST['date'] = date('Y-m-d H:i:s');

				$user->insert($_POST);

				$redirect = $mode == 'students' ? 'students' : 'users'; // Needs changing!!!!
				
				$this->redirect($redirect);

			}else{

				//errors
				$errors = $user->errors;
			}
		}

		

		$this->view('signup',[
			'errors'=>$errors,
			'mode'=>$mode,
		]);
	}
}