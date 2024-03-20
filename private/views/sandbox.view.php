<?php $this->view('includes/header')?>

<div class="container-fluid">

	<h1 class="text-center">Sandbox</h1>

</div>

<div class="container-fluid">

	<?php 

		// function sandboxVolunteerShiftByDay($vol = array()) {
		// 	$arr 		= [];
		// 	$shifts 	= [];
		// 	$try 		= [];

		// 	foreach ( $vol as $k => $v ) {

		// 		$vdate 	= $v['date'] ?? "";
		// 		$vshift 	= $v['shift'] ?? "";
		// 		$vois 	= $v['ois'] ?? "";

		// 		// @$arr[$vdate] .= $vshift."-".$vois.",";	//@ suppresses the errror undefined array type

		// 		$arr[$vdate] = ["AM"=>"", "PM"=>"", "M"=>""];

		// 		if($vshift == 'am') {
		// 			$arr[$vdate] .=  ['AM'=> $vois.','];
		// 		}

		// 	}

		// 	// foreach( $arr as $day => $vols ) {

		// 	// 	$shiftOis 			= explode('-', $vols);
		// 	// 	$shft 				= $shiftOis[0];
		// 	// 	$ois 					= $shiftOis[1];
		// 	// 	$try[]					= $shft .$ois.',';
		// 	// 	$shifts[$day] 	= $try;
		// 	// }

		// 	// return $shifts;
		// 	return $arr;
		// }

		// $payPeriod 	= 	'pp9';
		// $vol 				= 	getVolDays($pay_pers, $rows, $payPeriod); 
		// $pp 				= 	explode('p',$payPeriod);
		// $volunteers 	= sandboxVolunteerShiftByDay($vol);

		// show($volunteers);
		// show($vol);

	?>
<?php 
$file = $_SERVER['DOCUMENT_ROOT'] . 'tmp/trimester_1.csv';

$file = explode('/', $file);
$file = substr( $file[5], -5, 1);

echo $file;

?>
	
</div>

<?php $this->view('includes/footer')?>
