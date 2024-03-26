<?php
/**
 * Sandbox controller
 */
class Sandbox extends Controller {
	
	function index ( ) {

		$mod 	=	new Vot_model;
		
		$data 	=	$mod->findAll ( );
		$pper 	=	get_payperiods('17 Dec 2023', '30 Dec 2023');
		$pp 		=	'pp9';
		$vol 		=	getVolDays ( $pper, $data, $pp ); 
		$pp 		=	explode ( 'p', $pp );
		$vols 	=	volunteerShiftByDay ( $vol, $data ); 
		$c_vol 	= volunteer_rearrange_array($vol);



		echo $this->view('sandbox',[
			'vol' => $c_vol,
		]);
	}
}