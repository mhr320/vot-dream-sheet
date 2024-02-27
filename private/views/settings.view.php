<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid" style="margin-top: 60px;">
	<h1 class="text-center">Settings</h1>

		<div class="row container-fluid justify-content-center" style="margin-top: 60px;">

				<div class="col-3 p-4 shadow rounded mx-auto">
					<h5 class="text-center">Miscellaneous</h5>
					<form method="post">
						<input class="my-4 form-control" name="natca_contract_location" type="textbox" placeholder="Enter NATCA Contract Link">
						<button class="btn btn-sm btn-primary float-end">Update</button>
					</form>

				</div>
				<div class="col-3 p-4 shadow rounded mx-auto">
					<h5 class="text-center">VOT/FOT</h5>
				</div>
				<div class="col-3 p-4 shadow rounded mx-auto">
					<h5 class="text-center">Don't know yet</h5>
				</div>

		</div>

		<?=show($_POST, "Post Says")?>
</div>

<?php $this->view('includes/footer')?>