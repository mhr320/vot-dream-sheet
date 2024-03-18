<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1100px;margin-top: 60px;">
	<div class="row">
		<div class="col-4">
			<img src="./assets/cuphead" class="d-block mx-auto" style="width: 50%;">
			<p class="text-center fs-4	 fw-bold mt-3 mb-1"><?=$_SESSION['USER']->nom ?> (<?=$place?>)</p>
			<?php if(isset($_SESSION['USER']->mem)):?>
				<p class="text-center fw-bold" style="font-size: 12px;">Member #: <?=$_SESSION['USER']->mem?></p>
			<?php elseif($_SESSION['USER']->mem == 0):?>
				<p class="text-center fw-bold" style="font-size: 12px;">Member #: Missing</p>
			<?php endif?>

		</div>
		<div class="col-6 p-4">
			<h3 class="text-center p-4">My Schedules</h3>
				<table class="table table-borderless table-hover text-left">
					<tr>
						<td></td>
						<th class="text-center">S</th>
						<th class="text-center">M</th>
						<th class="text-center">T</th>
						<th class="text-center">W</th>
						<th class="text-center">T</th>
						<th class="text-center">F</th>
						<th class="text-center">S</th>
					</tr>
					
					<?php foreach($schedules1 as $line1):?>
						<?php $shift = explode(',',$line1->schedule);?>
						<?php if(strtoupper($line1->ois) == $_SESSION['USER']->ois):?>
						<tr><td class="text-center">Trimester 1</td>
							<td class="text-center"><?=strtoupper($shift[0])?></td>
							<td class="text-center"><?=strtoupper($shift[1])?></td>
							<td class="text-center"><?=strtoupper($shift[2])?></td>
							<td class="text-center"><?=strtoupper($shift[3])?></td>
							<td class="text-center"><?=strtoupper($shift[4])?></td>
							<td class="text-center"><?=strtoupper($shift[5])?></td>
							<td class="text-center"><?=strtoupper($shift[6])?></td>
						</tr>
						<?php endif?>
					<?php endforeach?>

					<?php foreach($schedules2 as $line2):?>
											<?php $shift = explode(',',$line2->schedule);?>
											<?php if(strtoupper($line2->ois) == $_SESSION['USER']->ois):?>
											<tr><td class="text-center">Trimester 2</td>
												<td class="text-center"><?=strtoupper($shift[0])?></td>
												<td class="text-center"><?=strtoupper($shift[1])?></td>
												<td class="text-center"><?=strtoupper($shift[2])?></td>
												<td class="text-center"><?=strtoupper($shift[3])?></td>
												<td class="text-center"><?=strtoupper($shift[4])?></td>
												<td class="text-center"><?=strtoupper($shift[5])?></td>
												<td class="text-center"><?=strtoupper($shift[6])?></td>
											</tr>
											<?php endif?>
										<?php endforeach?>

					<?php foreach($schedules3 as $line3):?>
											<?php $shift = explode(',',$line3->schedule);?>
											<?php if(strtoupper($line3->ois) == $_SESSION['USER']->ois):?>
											<tr><td class="text-center">Trimester 3</td>
												<td class="text-center"><?=strtoupper($shift[0])?></td>
												<td class="text-center"><?=strtoupper($shift[1])?></td>
												<td class="text-center"><?=strtoupper($shift[2])?></td>
												<td class="text-center"><?=strtoupper($shift[3])?></td>
												<td class="text-center"><?=strtoupper($shift[4])?></td>
												<td class="text-center"><?=strtoupper($shift[5])?></td>
												<td class="text-center"><?=strtoupper($shift[6])?></td>
											</tr>
											<?php endif?>
										<?php endforeach?>
					</table>
		</div>
	</div>
</div>
<?php $this->view('includes/footer')?>
