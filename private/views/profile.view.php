<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1100px;margin-top: 30px;">
	<div class="row">
		<div class="col-4">
			<img src="./assets/cuphead" class="d-block mx-auto" style="width: 50%;">
		</div>
		<div class="col-8 bg-light p-2">
			<table class="table table-striped table-hover table-border">
					<tr><th>Name:</th><td style="font-weight: bold;"><?=$_SESSION['USER']->nom ?> (<?=$place?>)</td></tr>
					<?php foreach($schedules1 as $line1):?>
						<?php if(strtoupper($line1->ois) == $_SESSION['USER']->ois):?>
						<tr><th>Trimester 1</th><td><?=str_replace(',', '&nbsp;',strtoupper($line1->schedule))?></td></tr>
						<?php endif?>
					<?php endforeach?>

					<?php foreach($schedules2 as $line2):?>
						<?php if(strtoupper($line2->ois) == $_SESSION['USER']->ois):?>
						<tr><th>Trimester 2</th><td><?=str_replace(',', '&nbsp;',strtoupper($line2->schedule))?></td></tr>
						<?php endif?>
					<?php endforeach?>

					<?php foreach($schedules3 as $line3):?>
						<?php if(strtoupper($line3->ois) == $_SESSION['USER']->ois):?>
						<tr><th>Trimester 3</th><td><?=str_replace(',', '&nbsp;',strtoupper($line3->schedule))?></td></tr>
						<?php endif?>
					<?php endforeach?>
					
					<tr><th>Member #:</th><td>35603</td></tr>
			</table>
		</div>
	</div>
</div>
<?php $this->view('includes/footer')?>
