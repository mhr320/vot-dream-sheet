<?php

// Schedules_management controller

class Schedules_management extends Controller
{

	//sets rotation number

	 function index ( ) {

	 	$rot 				= checkOddEven(idate('Y'));
	 	$rdopairs		= ['sm','mt','tw','wt','tf','fs','ss'];
	 	$group			= "";
	 	$errors 		= array();
	 	$validate 		= array();
	 	$schedules 	= new Schedules_model;
	 	$seniority 	= new Seniority_model;
	 	$initialsTri1 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(1) ) );
	 	$initialsTri2 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(2) ) );
	 	$initialsTri3 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(3) ) );

		if(!Auth::logged_in ( ) ) {
			$this->redirect('login');
		}

		if ( count ( $_POST ) > 0) {

			// showv ( $_POST );

			$trimester 	= !empty ( $_POST [ 'trimester' ] ) ? ( int ) $_POST [ 'trimester' ] : NULL;
			$schedule 	= !empty ( $_POST [ 'schedule' ] ) ? $_POST [ 'schedule' ] : NULL;
			$ois 				= !empty ( $_POST [ 'ois' ] ) ? $_POST [ 'ois' ] : NULL;
			$oisRem 		= !empty ( $_POST [ 'unassignInitials' ] ) ? $_POST [ 'unassignInitials' ] : NULL;
			$shift_0		= !empty ( $_POST [ '0' ] ) ? $_POST [ '0' ] : NULL;
			$shift_1		= !empty ( $_POST [ '1' ] ) ? $_POST [ '1' ] : NULL;
			$shift_2		= !empty ( $_POST [ '2' ] ) ? $_POST [ '2' ] : NULL;
			$shift_3		= !empty ( $_POST [ '3' ] ) ? $_POST [ '3' ] : NULL;
			$shift_4		= !empty ( $_POST [ '4' ] ) ? $_POST [ '4' ] : NULL;
			$shift_5		= !empty ( $_POST [ '5' ] ) ? $_POST [ '5' ] : NULL;
			$shift_6		= !empty ( $_POST [ '6' ] ) ? $_POST [ '6' ] : NULL;
			$mid_drop	= !empty ( $_POST [ 'mid_drop' ] ) ? $_POST [ 'mid_drop' ] : NULL;

			// showv($trimester);

			if ( $schedule ) {

				$scheduleAndID 	= explode ( '*', $schedule );
				$schedule 			= $scheduleAndID [ 0 ];
				$triLineID 			= $scheduleAndID [ 1 ];

			}

			$validate 			= [
										'trimester'			=>	$trimester, 
										'schedule'		=>	$schedule, 
										'ois'					=>	$ois, 
										'oisRem'			=>	$oisRem,
										'shift_0'			=>	$shift_0, 
										'shift_1'			=>	$shift_1, 
										'shift_2'			=>	$shift_2,
										'shift_3'			=>	$shift_3,
										'shift_4'			=>	$shift_4,
										'shift_5'			=>	$shift_5,
										'shift_6'			=>	$shift_6,
									];

			// showv ( $validate ); show ( count ( $validate ) );

			if ( !$schedules -> validateSchedMgmt ( $validate ) ) {
				$errors = $schedules->errors;
			}

			// die;
			//Assign CPC to line
			if ( !empty ( $ois ) && strlen ( $ois ) != 2 ) {
				$schedules->errors['ID'] = "Controller Not Selected";
			} else {
				if ( !isset ( $schedule ) ) {
					$schedules->errors['Schedule'] = "Unable to obtain Trimester Line ID";
				} else {
					// $id 		= $schedules->whereTriOisBlank($trimester, 'schedule', $schedule);
					// $id 		= $id[0]->id;
					$id = $triLineID;
					$data 	= ['ois'=>$ois];
					$schedules->updateNormal ( $trimester, $id, $data);
				$this->redirect('schedules_management');
				}
			}

			//Unassign CPC to line
			if ( !empty ( $oisRem ) && strlen ( $oisRem ) != 2 ) {
				$schedules->errors['Schedule'] = "Bad ID: Schedule not selected";
			} else {
				if ( $trimester == NULL || empty ( $trimester ) ) {
					$this->errors['Trimester'] = "You must select trimester";
				} else {
					$oid 		= $schedules->whereTriOisNotBlank( $trimester, 'ois', $oisRem);
					$oisid 		= $oid[0]->id;
					$data 	= ['ois'=>NULL];
					$schedules->updateNormal($trimester, $oisid, $data);
					$this->redirect('schedules_management');
				}
			}

			//Create new shift
			if ( strlen ( $shift_0 ) >= 1 && strlen ( $shift_1 ) >= 1 && strlen ( $shift_2 ) >= 1 && strlen ( $shift_3 ) >= 1 && strlen ( $shift_4 ) >= 1 && strlen ( $shift_5 ) >= 1 && strlen ( $shift_6 ) >= 1) {

				if ( $shift_0 == 'x' && $shift_1 == 'x' ) { $group = 'a'; }
				if ( $shift_1 == 'x' && $shift_2 == 'x' ) { $group = 'b'; }
				if ( $shift_2 == 'x' && $shift_3 == 'x' ) { $group = 'c'; }
				if ( $shift_3 == 'x' && $shift_4 == 'x' ) { $group = 'd'; }
				if ( $shift_4 == 'x' && $shift_5 == 'x' ) { $group = 'e'; }
				if ( $shift_5 == 'x' && $shift_6 == 'x' ) { $group = 'f';  }
				if ( $shift_6 == 'x' && $shift_0 == 'x' ) { $group = 'g'; }

				$concat = $shift_0 . ',' . $shift_1 . ',' . $shift_2 . ',' . $shift_3 . ',' . $shift_4 . ',' . $shift_5 . ',' . $shift_6;

				$shift = [ 
					'mid_drop' 	=> $mid_drop,
					'grp'				=> $group,
					'schedule'	=> $concat,
				];

				$schedules->insertTri ( (int) $trimester, $shift );
				$this->redirect('schedules_management');
			}
		}

		echo $this->view('schedules_management', [
			'schedules1'			=>	$schedules->scheduleFindAll ( 1 ),
			'schedules2'			=>	$schedules->scheduleFindAll ( 2 ),
			'schedules3'			=>	$schedules->scheduleFindAll ( 3 ),
			'sen_data'			=>	$seniority->seniorityList($rot, TRUE),
			'errors' 					=> 	$errors,
			'initialsTri1'			=>	$initialsTri1,
			'initialsTri2'			=>	$initialsTri2,
			'initialsTri3'			=>	$initialsTri3,
			'seniorityInitials'	=> 	oIS ( $seniority->seniorityList ( $rot, TRUE ) ),
		]);
	}

	public function initialsSelection ( ) {

		$rot 				= checkOddEven(idate('Y'));
	 	// $rdopairs		= ['sm','mt','tw','wt','tf','fs','ss'];
	 	// $group			= "";
	 	// $errors 		= array();
	 	// $validate 		= array();
	 	$schedules 	= new Schedules_model;
	 	$seniority 	= new Seniority_model;
	 	$initialsTri1 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(1) ) );
	 	$initialsTri2 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(2) ) );
	 	$initialsTri3 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(3) ) );

		if ( $_POST > 0 ) { 

			$trimester_number = ! empty ( $_POST [ 'trimester' ] ) ? $_POST [ 'trimester' ] : NULL;

			if ( $trimester_number == '1') {
				echo '<option value="">Select Initials from Trimester 1</option>';
				foreach ( $initialsTri1 as $ois ) { 
					echo '<option value="'.$ois.'">'.$ois.'</option>';
				}
			} elseif ( $trimester_number == '2') {
				echo '<option value="">Select Initials from Trimester 2</option>';
				foreach ( $initialsTri2 as $ois ) { 
					echo '<option value="'.$ois.'">'.$ois.'</option>';
				}
			} elseif ( $trimester_number == '3') {
				echo '<option value="">Select Initials from Trimester 3</option>';
				foreach ( $initialsTri3 as $ois ) { 
					echo '<option value="'.$ois.'">'.$ois.'</option>';
				}
			}
		}
	}

	public function lineSelection ( ) {

	 	// $rdopairs		= ['sm','mt','tw','wt','tf','fs','ss'];
	 	// $errors 		= array();
	 	// $validate 		= array();

	 	$n 				= 1;
	 	$grpcount 	= 0;
		$rdopair 		= ['sm','mt','tw','wt','tf','fs','ss'];
		$rot 				= checkOddEven(idate('Y'));
	 	$groups 		= ['a','b','c','d','e','f','g'];
	 	$schedules 	= new Schedules_model;
	 	$seniority 	= new Seniority_model;
	 	$initialsTri1 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(1) ) );
	 	$initialsTri2 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(2) ) );
	 	$initialsTri3 	= array_diff ( oIS ( $seniority->seniorityList($rot, TRUE) ), oIS ( $schedules->scheduleFindAll(3) ) );

	 	if ( $_POST > 0 ) { 

	 		$trimester_number = ! empty ( $_POST [ 'trimester' ] ) ? $_POST [ 'trimester' ] : NULL;

	 		// if ( $trimester_number == '1') {

	 			$trimester_number = (int) $trimester_number;

	 			$trimesterSchedule = $schedules->scheduleFindAll ( $trimester_number );

				echo '<option value="">Select Trimester ' . (String)$trimester_number .' Line</option><option value=""></option>';
				foreach( $trimesterSchedule as $schedule ) {

					 if ( !empty ( $schedule->ois ) ) {
					 	$line = 'Assigned';
					 } else {
					 	$line = str_replace (',' , ' ', strtoupper ( $schedule->schedule ) );
					 }

					 switch ( $schedule->grp ) {
						case 'a': 	$rdo = 0; break;
						case 'b': 	$rdo = 1; break;
						case 'c': 	$rdo = 2; break;
						case 'd': 	$rdo = 3; break;
						case 'e': 	$rdo = 4; break;
						case 'f': 	$rdo = 5; break;
						case 'g': 	$rdo = 6; break;
						default: break;
						} 

					$rdoPair = strtoupper($rdopair[$rdo]);
					 foreach ( $groups as $grp ) {
						 if ( $grp == $schedule->grp ) {
							echo '<option value="'.$schedule->schedule.'*'.$schedule->id.'">';
							$mid = $schedule->mid_drop == 'y' ? 'D' : '&nbsp; ';
						if ( $n <=9 ) {
							echo "&nbsp;".$n."&nbsp;".$rdoPair."&nbsp;". $mid . '&nbsp;' . $line;
						} else {
								echo $n."&nbsp;".$rdoPair."&nbsp;". $mid . '&nbsp;' . $line;
						}
						echo '</option>'; 
						$n++;
						}
					}
					$storedCountGRP = getGrpCount( $trimesterSchedule );
					$groups = ['a','b','c','d','e','f','g'];
					foreach($groups as $g) {
						if($schedule->grp == $g) {
							$grpcount++;
							if($grpcount == $storedCountGRP[$g]) {
								$grpcount = 0;
								echo "<option></option>";
							}
						} 
					} 
				}
			// }
		}
	}
}