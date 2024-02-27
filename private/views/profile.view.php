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
					<tr><th>Trimester 1</th><td>3.11.9.9.9.R.R</td></tr>
					<tr><th>Trimester 2</th><td>3.13.8.8.8.R.R</td></tr>
					<tr><th>Trimester 3</th><td>3.11.8.8.8.R.R</td></tr>
					<tr><th>Member #:</th><td>35603</td></tr>
			</table>
		</div>
	</div>
</div>
<?php $this->view('includes/footer')?>
