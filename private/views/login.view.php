<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

		<div class="container-fluid">
			<form method="post">
				<div class="p-4 mx-auto shadow rounded" style="margin-top:75px;width:100%;max-width: 340px;">
					<h2 class="my-4 text-center">VOT Dream Sheet</h2>
					<center><h1 class="text-danger" style="font-size: 60px;"> <i class="fa-solid fa-headset"></i> <i class="fa-solid fa-plane-up"></i> <i class="fa-solid fa-clipboard-list"></i></h1></center>
					<h3 class="my-4 text-center">Login</h3>

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

					<input class="my-3 form-control" value="<?=get_var('ois')?>" type="ois" name="ois" placeholder="Operating Initials" autofocus>
					<input class="my-3 form-control" value="<?=get_var('pwd')?>" type="password" name="pwd" placeholder="Password">
					<button class="d-block mx-auto btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	
<?php $this->view('includes/footer')?>
