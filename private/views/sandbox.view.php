<?php $this->view('includes/header')?>



<div class="container-fluid"><h1 class="text-center" style="margin-top: 100px;">Sandbox</h1></div>


<div class="container-fluid justify-content-center  rounded" style="min-width: 350;max-width: 1100px;">

<table class="table table-border table-hover">


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
				<th><?=$key?></th>
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
