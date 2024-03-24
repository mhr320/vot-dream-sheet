<?php

//for rotation of 2 with same dates across cbu,nbu,eod,scd
function checkOddEven($number)
{
	if($number % 2 == 0) 
	{
		return "desc";
	}else{
		return "asc";
	}
}

function get_var($key, $default = NULL)
{
	if(isset($_POST[$key]))
	{
		return $_POST[$key];
	}

	return $default;
}

//need rotation of 3 or more

//gets dates for a pay period

function get_payperiods($first, $last, $step = '+1 day', $output_format = 'j M Y')
{
	$dates = [];
	$current = strtotime($first);
	$last = strtotime($last);

	for($i = 1; $i<=26; $i++)
	{
		$periods = 'pp'.$i;

		while( $current <= $last)
		{
			$dates[$periods][] = date($output_format, $current);
			$current = strtotime($step, $current);	
		}

		$current = $current;
		$last = strtotime('+14 days', $last);
	}
	return $dates;
}

function get_vot_month($month)
	{
		$date = strtotime('2024-'.$month.'-01');
		$dateMonth = date('Y-m-d', $date); 
		$list = array();
		$_month = date("t", strtotime($dateMonth));
		$datesThisMonth = range(1, $_month);

		foreach($datesThisMonth as $date)
		{
			$list[] = $date . date(' M Y', strtotime($dateMonth));
		}
		return $list;
	}

function get_rdos_only($days = array(), $month)
{	
	$list = get_vot_month($month);
	$data = array();
	
	foreach($list as $key)
	{	
		if(isset($days))
		{
			foreach($days as $day)
			{	
				if(strtolower(date("D",strtotime($key))) == $day)
				{	
					$data[] = $key;
				}
			}
		}
	}
	return $data;
}

function get_select($key, $value)
{
	if(isset($_POST[$key]))
	{
		if($_POST[$key] == $value)
		{
			return "selected";
		}
	}

	return "";
}

function views_path($view, $data = array())
{
	extract($data);
	if(file_exists("../private/views/".$view . ".inc.php"))
		{
			require("../private/views/".$view . ".inc.php");

		}else{
			return("../private/views/404.view.php");
		}
}

function getVolDays($pay_pers, $rows, $pp){

	$volunteerDays = array();

	foreach($pay_pers[$pp] as $day) {

		foreach($rows as $k => $v) {

		 	if(strtotime($day) == strtotime($v->date) && (int)$v->shift_del != 1 ) {

		 		$eachDay = [];

		 		$eachDay['date']				=	$day;
		 		$eachDay['shift']				=	$v->shift;
		 		$eachDay['ois']					=	$v->ois;

		 		$volunteerDays[]				=	$eachDay;
		 	}
		 }
	}
	return $volunteerDays;
}

function show($print_r, $display_name = '')
{

	echo "<div class='container-fluid p-4'>";
	echo "<div style='margin-top:60px;'>";
	echo "**************** ";
	echo "<pre>";
	echo "<h6>$display_name</h6>";
	print_r($print_r);
	echo "</pre>";
	echo "**************** ";
	echo "</div>";
	echo "</div>";
}

function showv($var_dump, $display_name = '')
{
	echo "<div class='container-fluid p-4'>";
	echo "<div style='margin-top:60px;'>";
	echo "**************** ";
	echo "<pre>";
	echo "<h6>$display_name</h6>";
	var_dump($var_dump);
	echo "</pre>";
	echo "**************** ";
	echo "</div>";
	echo "</div>";
}

function volunteerShiftByDay($vol = array()) {
	$arr 		= [];
	$shifts = [];
	$try = [];
	foreach ( $vol as $k => $v ) {
		$vdate 	= $v['date'] ?? "";
		$vshift 		= $v['shift'] ?? "";
		$vois 		= $v['ois'] ?? "";
		@$arr[$vdate] .= $vshift."-".$vois.",";	//@ suppresses the errror undefined array type
	}
	foreach( $arr as $day => $vols ) {
		$shiftOis = explode('-', $vols);
		$shft = $shiftOis[0];
		$ois = $shiftOis[1];
		$try[] = $shft .$ois.',';
		$shifts[$day] = $try;
	}
	return $shifts;
}

function countGRP( $arr = [], $grp ) {
	$a=0;
	foreach($arr as $line) {
		if($line->grp === $grp) {
			$a++;
		}
	}
		return $a;
}

function getGrpCount($schedule = []) {
	$groups = ['a','b','c','d','e','f','g'];
	foreach($groups as $g) {
		$count[$g] =  countGRP($schedule, $g);
		$finalCount = $count;
	}
	return $finalCount;
} 

function transferCSV ( $file ) {
	$csv = [];
	if ( ( $handle = fopen ( $file, 'r' ) ) !== FALSE ) {
		while ( ( $data = fgetcsv ( $handle, 1000, "," ) ) !== FALSE ) {
			if ( count ( $data ) == 10 ) {

			$csv[] = [	
							"mid_drop" =>$data[1],
							"grp"=>$data[2],
							"schedule"=>$data[3] .','.$data[4].','.$data[5].','.$data[6].','.$data[7].','.$data[8].','.$data[9],
							"ois" => $data[0],
						];

			} else {

				$csv[] = [	
								"mid_drop" =>$data[0],
								"grp"=>$data[1],
								"schedule"=>$data[2] .','.$data[3].','.$data[4].','.$data[5].','.$data[6].','.$data[7].','.$data[8],
								"ois" => "",
							];
			}
		}
		return $csv;
	}
	fclose($handle);
}

function cleanCSV ($num,  $arr = array ( ) ) {

	$schedules = new Schedules_model;
	
	foreach ( $arr as $v ) {
		$arr = ["mid_drop"=>$v['mid_drop'],"grp"=>$v['grp'],"schedule"=>$v['schedule'],"ois"=>$v['ois']];
		$schedules->insertTri($num, $arr);
	}


}

function getTriNum ( $file ) {

	$num 			= explode ('/', $file);
	$tablenum 	= substr ( $num[5], -5, 1);
	return $tablenum;
	}

//gets initials from different tables
function oIS ( $data = [], $table = " " ) {
	$initialsList = [];
	foreach ( $data as $operating_initials ) {
		$initials = $operating_initials->ois;
		$initialsList [ ] = $initials;
	}
	return $initialsList;
}