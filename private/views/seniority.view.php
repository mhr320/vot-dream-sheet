<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 50px;width:80%;">
	<h1 class="p-3">Area 3 Seniority</h1>
	<h3 class="p-1">Current for <?= date('Y');?> bidding <?= date('Y', strtotime('+1 year')); ?></h3>
	<!-- <img src="<?=ROOT?>/assets/bidbuddylogo.png" class="mx-auto" style="width:520px;" > -->
	<table class="mx-auto table table-condensed table-striped table-borderless" style="width: auto;">
		<thead>
			<tr>
				<th scope="row" class="text-center" scope="col">#</th>
				<th scope="row" class="text-center" scope="col">NAME</th>
				<th scope="row" class="text-center" scope="col">Operating<br> Initials</th>
				<th scope="row" class="text-center" scope="col">CBU</th>
				<th scope="row" class="text-center" scope="col">NBU</th>
				<th scope="row" class="text-center" scope="col">EOD</th>
				<th scope="row" class="text-center" scope="col">SCD</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0;?>
			<?php foreach($rows as $row):?>
				<?php if(strtoupper($row->ois) == strtoupper($_SESSION['USER']->ois)):?>
				<tr class="table-info">
					<th class="text-center fw-bold"><?=++$i?></th>
					<?php if($row->role != 'd'):?>
					<td class="text-start fw-bold"><?=$row->nom?></td>
					<?php else:?>
					<td class="text-start fw-bold"><?=$row->nom.' ('.strtoupper($row->role).')'?></td>
					<?php endif?>
					<td class="text-center fw-bold"><?=$row->ois?></td>
					<td class="text-end fw-bold"><?=$row->cbu?></td>
					<td class="text-end fw-bold"><?=$row->nbu?></td>
					<td class="text-end fw-bold"><?=$row->eod?></td>
					<td class="text-end fw-bold"><?=$row->scd?></td>
				</tr>
			<?php else:?>
				<tr>
					<th class="text-center"><?=++$i?></th>
					<?php if($row->role != 'd'):?>
					<td class="text-start fw-bold"><?=$row->nom?></td>
					<?php else:?>
					<td class="text-start fw-bold"><?=$row->nom.' ('.strtoupper($row->role).')'?></td>
					<?php endif?>
					<td class="text-center"><?=$row->ois?></td>
					<td class="text-end"><?=$row->cbu?></td>
					<td class="text-end"><?=$row->nbu?></td>
					<td class="text-end"><?=$row->eod?></td>
					<td class="text-end"><?=$row->scd?></td>
				</tr>
			<?php endif?>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
</div>
<?php $this->view('includes/footer')?>
