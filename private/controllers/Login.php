<?php

/**
 * login controller
 */
class Login extends Controller
{
	
	function index()
	{

		$errors = array();

		if(count($_POST) > 0)
		{
			$user = new Seniority_model();

			if($row = $user->where('ois', $_POST['ois']))
			{
				$row = $row[0];

				if(password_verify($_POST['pwd'], $row->pwd))
				{
					Auth::authenticate($row);

					if(Auth::checkSuper() || Auth::checkAdmin())
					{
						$this->redirect('dashboard');
					}else{
						$this->redirect('home');
					}
				}

			}
				$errors['ois'] = "Wrong Operating Initials or password";

		}

		$this->view('login',[
			'errors'=>$errors,
		]);
	}
}