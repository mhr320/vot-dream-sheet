<?php 
	$this->view('includes/header');
	$this->view('includes/nav');
	?>
	<div class="container-fluid justify-content-center" style="min-width:350px; max-width: 400px; margin-top: 60px;">
	<?php if(count($errors) > 0):?>

		<div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
				<strong>Errors:</strong> 
				<?php foreach($errors as $error):?>
				<br> <?=$error?>
				<?php endforeach;?>
				<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</span>
		</div>

	<?php endif;?>

	<?php if(count($successes) > 0):?>

		<div class="alert alert-success alert-dismissible fade show p-1" role="alert">
				<strong>Success:</strong> 
				<?php foreach($successes as $success):?>
				<br> <?=$success?>
				<?php endforeach;?>
				<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</span>
		</div>

	<?php endif;?>
	</div>
<?php $this->view('includes/footer')?>
