<?php
/**
 * Payperiod controller
 */
class Payperiod extends Controller
{
	
	function index()
	{

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		$pp_start = '17 Dec 2023';
		$pp_end   = '30 Dec 2023';

		$pp = get_payperiods($pp_start,$pp_end);

		

		$user = $this->load_model('Payperiod_model');

		if(Auth::checkSuper())
		{
			echo $this->view('payperiod',[
			'paypers'=>$pp,
			]);
		}elseif(Auth::checkAdmin())
		{
			echo $this->view('payperiod',[
			'paypers'=>$pp,
		]);
		}else{
			$this->redirect('home');
		}
	}
}