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
	<div class="row container-fluid justify-content-center">
		<div class="col-4 p-4 border border-3 rounded" style="width:100%;max-width: 460px;background-color: white;">
			<h3 class="text-center p-3">Trimester 1</h3>
			<p class="fw-bold">Assign CPC to Line</p>
			<form method="post">
				<div class="form-group">
				<select class="form-control my-2"  name="schedule">
					<option value="">Select Trimester 1 Line</option>
					<option value=""></option>
					<?php $n=1;?>
					<?php $groups = ['a','b','c','d','e','f','g']; ?>
					<?php $rdopair = ['sm','mt','tw','wt','tf','fs','ss'];  ?>
					<?php foreach($schedules1 as $schedule):?>
						<?php if ( strlen ( $schedule->ois ) > 1 ):?> 
						<?php $line = 'Assigned'?>
						<?php else:?>
						<?php $line = str_replace(',', ' ', strtoupper($schedule->schedule));?>
						<?php endif?>
						<?php switch ( $schedule->grp ) {
							case 'a': 	$rdo = 0; break;
							case 'b': 	$rdo = 1; break;
							case 'c': 	$rdo = 2; break;
							case 'd': 	$rdo = 3; break;
							case 'e': 	$rdo = 4; break;
							case 'f': 	$rdo = 5; break;
							case 'g': 	$rdo = 6; break;
							default: break;
						} ?>
						<?php $rdoPair = strtoupper($rdopair[$rdo]);?>
						<?php foreach ( $groups as $grp ): ?>
							<?php if ( $grp == $schedule->grp ): ?>
								<option value="<?=$schedule->schedule?>">
									<?php $mid = $schedule->mid_drop == 'y' ? 'D' : '&nbsp; ';	?>
								<?php if ( $n <=9 ) {
									echo "&nbsp;".$n."&nbsp;".$rdoPair."&nbsp;". $mid . '&nbsp;' . $line;
								} else {
									echo $n."&nbsp;".$rdoPair."&nbsp;". $mid . '&nbsp;' . $line;
								}
							?> </option> <?php $n++;?>
						<?php endif?>
						<?php endforeach; ?>
						<?php 
							$storedCountGRP = getGrpCount($schedules1);
							$groups = ['a','b','c','d','e','f','g'];
							foreach($groups as $g) {
								if($schedule->grp == $g) {
									$grpcount++;
									if($grpcount == $storedCountGRP[$g]) {
										$grpcount = 0;
										echo "<option></option>";
									}
								} 
							} ?>
					<?php endforeach?>
				</select>
				<select class="form-control my-2" name="ois">
					<option value="">Select Controller</option>
					<?php foreach($initialsTri1 as $ois):?>
						<option value="<?=$ois;?>"><?=$ois;?></option>
					<?php endforeach?>
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
				<table class="table table-sm table-borderless align-middle">
					<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
					<tr>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
						<td><input class="form-control text-center" type="text" style="width: 20px;"></td>
					</tr>
				</table>
					<button class="btn btn-sm btn-primary float-end">Create</button>
					<br>
				<hr>
				
				</form>
				<form action="upload" method="post" enctype="multipart/form-data">
					<p class="fw-bold">Upload Trimester</p>

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
					
					<input class="form-control mb-3" type="file" name="fileToUpload" id="fileToUpload">
					<input class="btn btn-sm btn-primary float-end" type="submit" value="Upload" name="submit">
					<br>
					<br>
				</div>
			</form>
		</div>
		<div class="col-4 p-4 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
		</div>
		<div class="col-4 p-4 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
		</div>
	</div>
</div>

<?php $this->view('includes/footer')?>
