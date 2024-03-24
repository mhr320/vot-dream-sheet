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
					<h5 class="text-center">Schedules</h5>
					<form method="post">
						<p class="h5">Null OIS Trimester</p><br>
						<p>Check Trimester, then click NULL (only 1 @ a time)</p>
						<input type="checkbox" name="nullTriOis1" value="1">
						<label for="nullTriOis1">Trimester 1</label><br>
						<input type="checkbox" name="nullTriOis2" value="2">
						<label for="nullTriOis2">Trimester 2</label><br>
						<input type="checkbox" name="nullTriOis3" value="3">
						<label for="nullTriOis3">Trimester 3</label><br>
						<br>
						<button class="btn btn-danger">Null</button>
					</form>
				</div>

		</div>

</div>

<?php $this->view('includes/footer')?>