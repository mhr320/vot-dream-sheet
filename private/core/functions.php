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

function get_var($key, $default = "")
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
	echo "**************** ";
	echo "<pre>";
	echo "<h6>$display_name</h6>";
	print_r($print_r);
	echo "</pre>";
	echo "**************** ";
	echo "</div>";
}

function showv($var_dump, $display_name = '')
{
	echo "<div class='container-fluid p-4'>";
	echo "**************** ";
	echo "<pre>";
	echo "<h6>$display_name</h6>";
	var_dump($var_dump);
	echo "</pre>";
	echo "**************** ";
	echo "</div>";
}