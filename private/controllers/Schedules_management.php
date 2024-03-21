<?php

use Mpdf\Writer\ObjectWriter;

/**
 * Schedules_management controller
 */
class Schedules_management extends Controller
{
	// public $table = "seniority";

	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		//sets rotation number
		$rot 						= checkOddEven(idate('Y'));

		$errors 				= array();
		$schedules 		= new Schedules_model;
		$seniority 			= new Seniority_model;

		$seniority_rows 	= $seniority->seniorityList($rot, TRUE);
		$schedule1 		= $schedules->scheduleFindAll(1);
		$schedule2 		= $schedules->scheduleFindAll(2);
		$schedule3 		= $schedules->scheduleFindAll(3);

		//oIS returns only operating initials
		$seniorityInitials 		= oIS($seniority_rows);
		$scheduleInitialsTri1 	= oIS($schedule1);
		$scheduleInitialsTri2 	= oIS($schedule2);
		$scheduleInitialsTri3 	= oIS($schedule3);

		$initialsTri1 = array_diff($seniorityInitials, $scheduleInitialsTri1);
		$initialsTri2 = array_diff($seniorityInitials, $scheduleInitialsTri2);
		$initialsTri3 = array_diff($seniorityInitials, $scheduleInitialsTri3);
		
		if ( count ( $_POST ) > 0) {

			$schedule 		= isset ( $_POST [ 'schedule' ] ) ? $_POST [ 'schedule' ] : "";
			$ois 				= isset ( $_POST [ 'ois' ] ) ? $_POST [ 'ois' ] : "";
			$oisUnassign 	= isset ( $_POST [ 'unassignInitials' ] ) ? $_POST [ 'unassignInitials' ] : "";

			//Assign CPC to line
			if ( strlen ( $ois ) > 1 ) {
				$id 		= $schedules->whereTri1OisBlank('schedule', $schedule);
				$id 		= $id[0]->id;
				$data 	= ['ois'=>$ois];
				$schedules->updateNormal($id, $data);
			}

			//Unassign CPC to line
			if ( strlen ( $oisUnassign ) > 1 ) {
				$oid 		= $schedules->whereTri1OisNotBlank('ois', $oisUnassign);
				$oisid 		= $oid[0]->id;
				$data 	= ['ois'=>NULL];
				$schedules->updateNormal($oisid, $data);
			}
				$this->redirect('schedules_management');
		}

		echo $this->view('schedules_management', [
			'schedules1'		=>	$schedule1,
			'schedules2'		=>	$schedule2,
			'schedules3'		=>	$schedule3,
			'sen_data'			=>	$seniority_rows,
			'errors' 				=> 	$errors,
			'initialsTri1'			=>	$initialsTri1,
			'initialsTri2'			=>	$initialsTri2,
			'initialsTri3'			=>	$initialsTri3,
			'seniorityInitials'	=> 	$seniorityInitials,
		]);
	}
}