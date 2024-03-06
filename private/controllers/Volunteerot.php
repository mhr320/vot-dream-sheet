<?php
/**
 * VolunteerOT controller
 */
class Volunteerot extends Controller
{
	
	function index() {
		if(!Auth::logged_in()) {
			$this->redirect('login');
		}

		$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
		$vot = array();
		$errors = array();
		$vol = new Vot_model();
		$rows = $vol->whereVOT('ois',$_SESSION['USER']->ois,'asc');


		if($rows){
			$rows = array_unique($rows, SORT_REGULAR);
		}

		if(count($_POST) > 0){

			if(empty($_POST['rdos'])) {
				$errors['rdos'] = "RDOs not selected";
			}

			if(empty($_POST['months'])) {
				$errors['rdos'] = "Month not selected";
			}

			//check when cancel buton pressed
				if (isset($_POST["votcancel"])) {
				    if (!filter_input(INPUT_POST, "votcancel") === false) {
				    	$this->redirect('volunteerot');
				    }
				}
			//check when volunteer button is pressed
				if ($_POST['vot'] === 'VOLUNTEER') {

					$vot['shift'] 	=	$_POST['shift'];
					$vot['date'] 	= 	$_POST['votday'];
					$vot['ois'] 	= 	strtolower($_SESSION['USER']->ois);

					if($vol->validate($vot)) {

						$vol->insert($vot);

						$this->redirect('volunteerot');

					} else {

						$errors = $vol->errors;
					}

				}

		} 
		// show($rows);
// show($_POST,'POST says ->');
		echo $this->view('volunteerot',[
		'rows'		=> 	$rows,
		'errors' 	=>	$errors,
		'months'	=>	$months,
		]);
	}


	public function delete($id = null, $shift_del) {

		$vol = new Vot_model();

		$errors = array();

		if(isset($id)){

			$data['shift_del'] = (int)$shift_del;
			$data['datetime_shift_del'] = date('Y-m-d H:i:s', strtotime("now"));

			// add timestamp to $data[]

			// show($data);die;	
			$vol->del_without_delete($id, $data);	
			$this->redirect('volunteerot');
		}

	}
}