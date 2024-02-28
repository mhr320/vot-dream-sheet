<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>


<?php 
			$payPeriod 				= 	'pp9';
			$vol 							= 	getVolDays($pay_pers, $rows, $payPeriod); 
			$pp 								= 	explode('p',$payPeriod);
			?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 60px;width:80%;">
	<h1 class="p-3">Area 3 Volunteer Overtime by Pay Period</h1><br>
	<h3><?='Pay Period '.$pp[2]?></h3>

	<table class="table table-hover table-sm">
		<tr>
			<th>Date</th>
			<th>AM</th>
			<th>PM</th>
			<th>Mid</th>
		</tr>
		<?php foreach($vol as $k => $v):?>

		<tr>
			<th><?=date("j M Y (l)",strtotime($v['date']))?></th>

			<?php if($v['shift'] == 'am'):?>

			<td><?=strtoupper($v['ois'])?></td><td></td><td></td>

			<?php elseif($v['shift'] == 'pm'):?>

			<td></td><td><?=strtoupper($v['ois'])?></td><td></td>

			<?php else:?>

			<td></td><td></td><td><?=strtoupper($v['ois'])?></td>

			<?php endif;?>

		<?php endforeach;?>

		</tr>

	</table>
</div>
<?php show($vol)?>

<?php $this->view('includes/footer')?>