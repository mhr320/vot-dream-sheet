<?php
include('../core/functions.php');

$month = isset($_POST['month']) ? $_POST['month'] : "";
$rdays = isset($_POST['rdos']) ? explode('-',$_POST['rdos']) : "";


if (isset($month) && isset($rdays)) {

	$rdos = get_rdos_only( $rdays, $month );

	echo '<select class="my-3 form-control" name="votday" id="votday">';
	echo '<option value="" class="text-center">Select VOT Date</option>';

	foreach($rdos as $day) {

		echo '<option ' . get_select("votday", date("Y-m-d",strtotime($day))) . 'value="' . date("Y-m-d",strtotime($day)) . '">' . date("j M Y (D)",strtotime($day)) . '</option>';

	}
		
	echo '</select>';

	echo '<select class="my-3 form-control" name="shift" id="shift">';
	echo '<option value="" class="text-center">Select Shift</option>';
	echo '<option '. get_select('shift','am') . ' value="am">Morning Shift</option>';
	echo '<option ' . get_select('shift','pm') . ' value="pm">Evening Shift</option>';
	echo '<option ' . get_select('shift','mid') . ' value="mid">Midnight Shift</option>';
	echo '</select>';

	echo '<input class="btn btn-success float-end" type="submit" name="vot" value="VOLUNTEER">';
	echo '<input class="btn btn-dark" type="submit" name="votcancel" value="CANCEL">';
}