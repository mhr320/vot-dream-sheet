<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid" style="margin-top: 60px;">
	<h2 class="text-center">Schedule Management</h2>
	<div class="row container-fluid justify-content-center">

		<div class="col-4 p-4 border border-3 rounded" style="margin-top:60px;width:100%;max-width: 460px;background-color: white;">
			<h3 class="text-center p-3">Trimester 1</h3>
			<p class="fw-bold">Update controller line assignment</p>
			<form method="post">

				<div class="form-group">

				<select class="form-control my-2" id="scheduleTri1">

					<option>Select Trimester 1 Line</option>

					<option></option>

					<?php $n=1;?>

					<?php foreach($schedules1 as $schedule):?>

						<?php $line = str_replace(',', ' ', strtoupper($schedule->schedule));?>

						<?php if($schedule->grp == "a"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." SM  ".$line;
								} else {
									echo $n." SM  ".$line;
								}?>
							</option>
							<?php $n++?>
							
						<?php elseif($schedule->grp == "b"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." MT  ".$line;
								} else {
									echo $n." MT  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php elseif($schedule->grp == "c"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." TW  ".$line;
								} else {
									echo $n." TW  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php elseif($schedule->grp == "d"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." WT  ".$line;
								} else {
									echo $n." WT  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php elseif($schedule->grp == "e"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." TF  ".$line;
								} else {
									echo $n." TF  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php elseif($schedule->grp == "f"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." FS  ".$line;
								} else {
									echo $n." FS  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php elseif($schedule->grp == "g"):?>
							<option>
								<?php if($n <=9) {
									echo "&nbsp;".$n." SS  ".$line;
								} else {
									echo $n." SS  ".$line;
								}?>
							</option>
							<?php $n++?>

						<?php endif?>

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
				<select class="form-control my-2">
					<option>Select Controller</option>
					<?php foreach($sen_data as $ois):?>
						<option><?=$ois->ois;?></option>
					<?php endforeach?>
				</select>
				<hr>
				<p class="fw-bold">Create New Trimester 1 Line</p>
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
				<hr>
				<p class="fw-bold">Delete Trimester 1 Line</p>
				<select class="form-control my-2" id="scheduleTri1">

					<option>Select Trimester 1 Line</option>

					<option></option>
				<?php $n=1;?>

				<?php foreach($schedules1 as $schedule):?>

					<?php $line = str_replace(',', ' ', strtoupper($schedule->schedule));?>

					<?php if($schedule->grp == "a"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." SM  ".$line;
							} else {
								echo $n." SM  ".$line;
							}?>
						</option>
						<?php $n++?>
						
					<?php elseif($schedule->grp == "b"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." MT  ".$line;
							} else {
								echo $n." MT  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php elseif($schedule->grp == "c"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." TW  ".$line;
							} else {
								echo $n." TW  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php elseif($schedule->grp == "d"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." WT  ".$line;
							} else {
								echo $n." WT  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php elseif($schedule->grp == "e"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." TF  ".$line;
							} else {
								echo $n." TF  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php elseif($schedule->grp == "f"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." FS  ".$line;
							} else {
								echo $n." FS  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php elseif($schedule->grp == "g"):?>
						<option>
							<?php if($n <=9) {
								echo "&nbsp;".$n." SS  ".$line;
							} else {
								echo $n." SS  ".$line;
							}?>
						</option>
						<?php $n++?>

					<?php endif?>

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
