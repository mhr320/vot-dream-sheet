<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

		<div class="container-fluid">
			<div class="p-4 mx-auto shadow rounded" style="margin-top:60px;width:100%;max-width: 340px;">
				<form method="post">
				<h2 class="my-4 text-center">VOT Dream Sheet</h2>
				<center><h1 class="text-danger" style="font-size: 60px;"> <i class="fa-solid fa-headset"></i> <i class="fa-solid fa-plane-up"></i> <i class="fa-solid fa-clipboard-list"></i></h1></center>
				<h3 class="my-4 text-center">Add User</h3>

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
					
				<input class="my-3 form-control" type="firstname" name="fnom" placeholder="First Name">
				<input class="my-3 form-control" type="lastname" name="lnom" placeholder="Last Name">
				<input class="my-3 form-control" type="email" name="email" placeholder="Email">
				<select class="my-2 form-control" name="role">
					<option value="">Select Role</option>
					<option value="c">CPC</option>
					<option value="d">Developmental</option>
					<?php if(Auth::getRole() == 'super_admin'):?>
					<option value="admin">Scheduler</option>
					<option value="super_admin">Super Admin</option>
					<?php endif;?>
				</select>
				<input class="my-3 form-control" type="password" name="password" placeholder="Password">
				<input class="my-3 form-control" type="password2" name="password2" placeholder="Retype Password">
				<button class="btn btn-danger">Cancel</button>
				<button class="me-auto btn btn-primary float-end">Add User</button>
				</form>
			</div>
		</div>
	
<?php $this->view('includes/footer')?>