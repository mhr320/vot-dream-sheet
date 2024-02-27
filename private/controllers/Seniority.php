<?php
/**
 * Seniority controller
 */
class Seniority extends Controller
{
	private $rot = '';

	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		$this->rot = checkOddEven(idate('Y'));

		$user = $this->load_model('Seniority_model');

		$data = $user->seniorityList($this->rot);

		echo $this->view('seniority',['rows' => $data]);
	}
}