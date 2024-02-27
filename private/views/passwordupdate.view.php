<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid">
	<div class="p-4 mx-auto shadow rounded" style="margin-top:60px;width:100%;max-width: 340px;">
		<form method="post">
			<h2 class="my-4 text-center">VOT Dream Sheet</h2>
				<center><h1 class="text-danger" style="font-size: 60px;"> <i class="fa-solid fa-headset"></i> <i class="fa-solid fa-plane-up"></i> <i class="fa-solid fa-clipboard-list"></i></h1></center>
					<h3 class="my-4 text-center">Update Password</h3>
					<?php if(Auth::isBasicUser() == true):?>
						<input type="hidden" value="<?=$_SESSION['USER']->ois?>" type="text" name="ois">
						<?php elseif(Auth::isAdmin() || Auth::isSuper()):?>
							<select class="my-2 form-control" name="ois">
							<option value="">Select User</option>
							<?php foreach($inits as $init):?>
								<option <?=get_select('ois', '"'.$init->ois.'"')?> value="<?=$init->ois?>"><?=$init->ois?></option>
							<?php endforeach;?>
						<?php endif;?>

					</select>

					<input class="my-3 form-control" type="text" name="pwd" placeholder="New Password">
					<input class="my-3 form-control" type="text" name="password2" placeholder="Retype New Password">
					
					<button class="btn btn-danger">Cancel</button>
					<button class="me-auto btn btn-primary float-end">Update Password</button>
		</form>
	</div>
</div>
<?php $this->view('includes/footer')?>
