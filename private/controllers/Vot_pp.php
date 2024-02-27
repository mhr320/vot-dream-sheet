<?php
/**
 * 
 */
class Vot_pp extends Controller
{

	public function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$vot = new Vot_model();

		$rows = $vot->findAll();

		$pay_periods = get_payperiods('17 Dec 2023', '30 Dec 2023');
		
		// show($rows);
		echo $this->view('vot_pp',[
			'rows'	=> $rows,
			'pay_pers' 	=> $pay_periods,
		]);
	}
}