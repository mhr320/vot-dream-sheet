<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>


<?php 
			$payPeriod 				= 	'pp9';
			$vol 							= 	getVolDays($pay_pers, $rows, $payPeriod); 
			$pp 							= 	explode('p',$payPeriod);
		?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 60px;width:80%;">

	<!-- <h1 class="p-3">Area 3 Volunteer Overtime by Pay Period</h1><br>
	<h3><?='Pay Period '.$pp[2]?></h3>
 -->
	<!-- <table class="table table-bordered"> -->
		<!-- <tr><th>Date</th><th>AM</th><th>PM</th><th>Mid</th></tr> -->
				<?php foreach( $vol as $v ):?>
					<!-- <tr><th class="align-middle"><?=$v['date']?></th> -->

								<?php if($v['shift'] == 'am'):?>
									<!-- <td>
									<table class="table table-borderless">
									<tr><td><?=$v['ois']?></td></tr>
									</table>
									</td>
									<td>
									<table class="table table-borderless">
									</table>
									</td>
									<td>
									<table class="table table-borderless">
									</table>
									</td></tr> -->
								<?php endif;?>
								<?php if ( $v['shift'] == 'pm' ):?>
									<!-- <td>
									<table class="table table-borderless">
									</table>
									</td>
									<td>
									<table class="table table-borderless">
										<tr><td><?=$v['ois']?></td></tr>
									</table>
									</td>
									<td>
									<table class="table table-borderless">
									</table>
									</td>
									<td></tr> -->
								<?php endif;?>
								<?php if ( $v['shift'] == 'mid' ):?>
								<!-- <td>
								<table class="table table-borderless">
								</table>
								</td>
								<td>
								<table class="table table-borderless">
								</table>
								</td>
								<td>
								<table class="table table-borderless">
									<tr><td><?=$v['ois']?></td></tr>
								</table>
								</td>
								<td></tr> -->
							<?php endif;?>
									
						
					<!-- </tr> -->
				<?php endforeach;?>
				<!-- </table><br> -->
</div> 


<?php //testing area


// foreach ($pay_pers[$payPeriod] as $day) {

// 	foreach ($rows as $k => $v) {

// 		if ( strtotime($day) == strtotime($v->date) && (int)$v->shift_del != 1) {
// 			echo $day." ". $v->ois . " " . $v->shift;
// 			echo "<br>";
// 		}

// 	}
// }

	show($rows,"\$rows");	
	// showv($vol,"\$vol");
	// show($pay_pers[$payPeriod],"\$pay_pers");
?>
<?php $this->view('includes/footer')?>