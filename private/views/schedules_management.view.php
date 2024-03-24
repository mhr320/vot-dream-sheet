<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<style>
	mark {
		background-color: #ff4d4d;
	}
</style>
<?php $grpcount = 0;?>
<div class="container-fluid" style="margin-top: 40px;">
	<h2 class="text-center">Schedule Management</h2>
	<div class="row p-4 container-fluid justify-content-center">
		<div class="col-4 p-4 border border-3 rounded" style="max-width: 460px;background-color: white;">
			<!-- <h3 class="text-center p-3">Trimester 1</h3> -->
			<form method="post">
				<div class="form-group">

					<p class="h5 fw-bold">Trimester (Must Select)</p>	
					<select class="border-4 border-primary text-center form-control p-3 my-2" name='trimester' id="trimester">
						<option value="" >Select Trimester Here First!!!</span></option>
						<option value="1">Trimester 1</option>
						<option value="2">Trimester 2</option>
						<option value="3">Trimester 3</option>
					</select>
				
			<p class="fw-bold">Assign CPC to Line</p>
				<select class="form-control my-2" name="ois" id="ois">
				</select>

				<select class="form-control my-2"  name="schedule" id="schedule">
					
				</select>

				<button class="btn btn-sm btn-primary float-end">Assign</button>
				<br>
				<hr>

				
				<p class="fw-bold">Unassign CPC from Line</p>
				<select class="form-control my-2" name="unassignInitials">
					<option value="">Select Controller</option>
					<?php foreach($seniorityInitials as $ois):?>
						<option value="<?=$ois;?>"><?=$ois;?></option>
					<?php endforeach?>
				</select>
					<button class="btn btn-sm btn-primary float-end">Unassign</button>
					<br>
					<hr>
				<p class="fw-bold">Create New Line</p>
				<label class="text-primary fw-bold" for="mid_drop">Mid Drop Line</label>
				<input type="checkbox" name="mid_drop" value="y">
				<table class="table table-sm table-borderless align-middle">
					<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
					<tr>
						<td><input name="0"	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="1" 	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="2"	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="3"	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="4" 	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="5"	class="text-center" type="text" style="width: 30px;"></td>
						<td><input name="6"	class="text-center" type="text" style="width: 30px;"></td>
					</tr>
				</table>
					<button class="btn btn-sm btn-primary float-end">Create</button>
					<br>
				<hr>
				
				</form>
				<form action="upload" method="post" enctype="multipart/form-data">
					<p class="fw-bold">Upload Trimester</p>

					
					
					<input class="form-control mb-3" type="file" name="fileToUpload" id="fileToUpload">
					<input class="btn btn-sm btn-primary float-end" type="submit" value="Upload" name="submit">
					<br>
					<br>
				</div>
			</form>
		</div>
		<div class="col-1"></div>
		<div class="col-6 p-4 border border-3 rounded" style="max-width: 860px;background-color: white;">
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
		</div>
	</div>
</div>
<?php $this->view('includes/footer')?>
