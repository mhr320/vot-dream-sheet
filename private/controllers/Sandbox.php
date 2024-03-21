<?php
/**
 * Sandbox controller
 */
class Sandbox extends Controller
{
	
	function index()
	{
		$rot = checkOddEven(idate('Y'));

		$vot = new Vot_model();

		$rows = $vot->findAll();

		$pay_periods = get_payperiods('17 Dec 2023', '30 Dec 2023');

		$initialsRemaining = array_diff($seniorityInitials, $scheduleInitials);

		echo $this->view('sandbox',[
			'rows'	=> $rows,
			'pay_pers' 	=> $pay_periods,
		]);
	}
}