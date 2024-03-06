<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>


<?php 

	$payPeriod 				= 	'pp9';
	$vol 							= 	getVolDays($pay_pers, $rows, $payPeriod); 
	$pp 							= 	explode('p',$payPeriod);

?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 60px;width:80%;">
<!-- 
	<h1 class="p-3">Area 3 Volunteer Overtime by Pay Period</h1><br>
	<h3><?='Pay Period '.$pp[2]?></h3>

	<table class="table table-bordered"> -->
		<!-- <tr><th>Date</th><th>AM</th><th>PM</th><th>Mid</th></tr> -->

				<?php foreach( $vol as $v ):?>

					<!-- <tr><th class="align-middle"><?=$v['date']?></th> -->

								<?php if($v['shift'] == 'am' && $v['shift'] != 'pm' && $v['shift'] != 'mid'):?>
									<!-- <td>
									<table class="table table-bordered">
									<tr><td class="fw-bold"><?=strtoupper($v['ois'])?></td></tr>
									</table>
									</td>
									<td>
									<table class="table table-bordered">
									</table>
									</td>
									<td>
									<table class="table table-bordered">
									</table>
									</td></tr> -->
								<?php endif;?>

								<?php if ( $v['shift'] == 'pm'  && $v['shift'] != 'am' && $v['shift'] != 'mid'):?>
									<!-- <td>
									<table class="table table-bordered">
									</table>
									</td>
									<td>
									<table class="table table-bordered">
										<tr><td class="fw-bold"><?=strtoupper($v['ois'])?></td></tr>
									</table>
									</td>
									<td>
									<table class="table table-bordered">
									</table>
									</td>
									</tr> -->
								<?php endif;?>

								<?php if ( $v['shift'] == 'mid'  && $v['shift'] != 'am' && $v['shift'] != 'pm'):?>
								<!-- <td>
								<table class="table table-bordered">
								</table>
								</td>
								<td>
								<table class="table table-bordered">
								</table>
								</td>
								<td>
								<table class="table table-bordered">
									<tr><td class="fw-bold"><?=strtoupper($v['ois'])?></td></tr>
								</table>
								</td>
								</tr> -->
							<?php endif;?>
									
						
					<!-- </tr> -->
				<?php endforeach;?>
				<!-- </table><br> -->
</div> 


<?php //testing area

// function get_vd ( $arr1 = [ ], $arr2 = [ ] ) {
// 	$dates 	= [ ];
// 	$vdates 	= [ ];
// 	foreach ( $arr1 as $k => $day ) {
// 		foreach ( $arr2 as $key => $vday ) {
// 			if ( strtotime ( $day ) === strtotime ( $vday [ 'date' ] ) ) {
// 					$vdates[ $day ] =  [ ];
// 			} 
// 		}
// 	}
// 	$dates[ ] = $vdates;
// 	return $dates;
// }

// $volDates = get_vd($pay_pers['pp9'], $vol);
// show ($volDates);



$arr = [];

foreach ( $vol as $k => $v ) {

	$vdate = $v['date'] ?? "";
	$vshift = $v['shift'] ?? "";
	$vois = $v['ois'] ?? "";

	@$arr[$vdate] .= $vshift."-".$vois.",";	//@ suppresses the errror undefined array type
}
show($arr);

foreach( $arr as $s ) {
	$shifts = explode(',', trim($s,','));
	show($shifts);
}

foreach ( $shifts as $volshift => $vois ) {
	if (str_contains($vois, 'mid') ) {
	// echo $vs;
		$ois = explode('-', $vois);
		echo strtoupper($ois[1]). " Wants to work ".strtoupper($ois[0]);
	}

}

?>

<?php $this->view('includes/footer')?>