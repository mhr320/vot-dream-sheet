<?php
/**
 * Password Update controller
 */
class Passwordupdate extends Controller
{
	
	function index()
	{

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		$pw = $this->load_model('Seniority_model');

		$inits = $pw->seniorityList("desc");

		if(count($_POST) > 0)
		{
			$data['ois'] = $_POST['ois'];
			$data['pwd'] = $_POST['pwd'];

			$pw->update($_POST['ois'], $data);
		}
		
		echo $this->view('passwordupdate',[
			'inits'=>$inits,
		]);
	}
}