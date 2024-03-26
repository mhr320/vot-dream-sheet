<?php
/**
 * 
 */
class Vot_pp extends Controller
{

	public function index() {

		$mod 	=	new Vot_model;
		
		$data 	=	$mod->findAll ( );
		$pper 	=	get_payperiods('17 Dec 2023', '30 Dec 2023');
		$pp 		=	'pp9';
		$vol 		=	getVolDays ( $pper, $data, $pp ); 
		$pp 		=	explode ( 'p', $pp );
		$vols 	=	volunteerShiftByDay ( $vol, $data ); 
		$c_vol 	= volunteer_rearrange_array($vol);

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		// $vot 		= new Vot_model();
		// $rows 	= $vot->findAll();

		$pay_periods = get_payperiods('17 Dec 2023', '30 Dec 2023');
		
		// show($rows);
		echo $this->view('vot_pp',[
			'vol' => $c_vol,
		]);
	}
}