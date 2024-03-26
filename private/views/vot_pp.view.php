<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>


<?php 

// $payPeriod 	= 	'pp9';
// $vol 				= 	getVolDays ( $pay_pers, $rows, $payPeriod ); 
// $pp 				= 	explode ( 'p', $payPeriod );
// $volunteers 	=  volunteerShiftByDay ( $vol ); ?>

<div class="mx-auto shadow rounded text-center justify-content-center container-fluid p-5" style="min-width: 350px;margin-top: 110px;width:80%;">

	<table class="table table-border table-hover mx-auto" style="width: 80%;">


		<tr>
			<th></th>
			<th>AM</th>
			<th>PM</th>
			<th>MD</th>
			<th></th>
			<th></th>
		</tr>


		<?php foreach($vol as $key => $val): ?>
			<tr>
				<th class="text-start"><?=$key?></th>
				<td class="text-primary fw-bold"><?=!empty($val['am'])	? strtoupper($val['am']) : "";?></td>
				<td class="text-primary fw-bold"><?=!empty($val['pm']) 	? strtoupper($val['pm']) : "";?></td>
				<td class="text-primary fw-bold"><?=!empty($val['mid'])	? strtoupper($val['mid']) : "";?></td>
				<td></td>
				<td></td>
			</tr>
		<?php endforeach?>

</table>
</div> 




<?php $this->view('includes/footer')?>