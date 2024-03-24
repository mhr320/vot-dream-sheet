<?php
/**
 * Sandbox controller
 */
class Sandbox extends Controller
{

		public $initials1 = ['aa','bb','cc'];
		public $initials2 = ['dd','ee','ff'];
		public $initials3 = ['gg','hh','ii'];
		public $forfucksake = 'For Fucks Sake';
	
	function index()
	{
		

		echo $this->view('sandbox',[
			'tri1_inits' => $this->initials1,
			'tri2_inits' => $this->initials2,
			'tri3_inits' => $this->initials3,
		]);
		
	}

	function initialsSelection ( ) {

		if ( $_POST > 0 ) { 

			$trimester_number = ! empty ( $_POST [ 'trimester' ] ) ? $_POST [ 'trimester' ] : NULL;

			if ( $trimester_number == "1") {
				echo '<option value="">Select Initials</option>';	
				foreach ( $this->initials1 as $tri1_inits) {
					echo '<option value="'.$tri1_inits.'">'.$tri1_inits.'</option>';	
				}
			} elseif ( $trimester_number == "2") {
				echo '<option value="">Select Initials</option>';	
				foreach ( $this->initials2 as $tri2_inits) {
					echo '<option value="'.$tri2_inits.'">'.$tri2_inits.'</option>';	
				}
			} elseif ( $trimester_number == "3") {
				echo '<option value="">Select Initials</option>';	
				foreach ( $this->initials3 as $tri3_inits) {
					echo '<option value="'.$tri3_inits.'">'.$tri3_inits.'</option>';	
				}
			}
		}
	}
}