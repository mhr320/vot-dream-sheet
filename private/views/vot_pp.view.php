<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>


<?php 

$payPeriod 	= 	'pp9';
$vol 				= 	getVolDays($pay_pers, $rows, $payPeriod); 
$pp 					= 	explode('p',$payPeriod);
$volunteers 	= volunteerShiftByDay($vol);


?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 60px;width:80%;">

	<!-- <h1 class="p-3">Area 3 Volunteer Overtime by Pay Period</h1><br>
	<h3><?='Pay Period '.$pp[2]?></h3>

		<table class="table table-bordered">
			<tr><th>Date</th><th>AM</th><th>PM</th><th>Mid</th></tr> -->

		<!-- </table> -->
				
</div> 


<?php //testing area
	// show($vol);
	show($volunteers);
	
?>

<?php $this->view('includes/footer')?>