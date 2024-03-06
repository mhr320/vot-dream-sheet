<div class="col-4 p-4 shadow rounded bg-light" style="margin-top:60px;width:100%;max-width: 350px;">

	<h3 class="p-3 text-center">VOT Selections for <?=Auth::getOis()?></h3>
		<?php if($rows):?>
			<table class="table table-sm table-hover">
				<tr><th scope="row">Date</th><th scope="row">Shift</th><th scope="row"></th>
			<?php foreach($rows as $key => $val):?>
				<?php if($val->shift_del != 1 && strtotime($val->date) > strtotime('Today')):?>
				<tr>
					<td class="p-2"><?=date("jS M y (D)", strtotime($val->date))?></td>
					<td class="text-start p-2">
						<?php 
						switch ($val) {
							case $val->shift == 'am':
								// code...
								echo "AM";
								break;
							case $val->shift == 'pm':
								// code...
								echo "PM";
								break;
							case $val->shift == 'mid':
								// code...
								echo "Mid";
								break;
							case $val->shift == 'ampm':
								// code...
								echo "AM / PM";
								break;
							case $val->shift == 'pmm':
								// code...
								echo "PM / Mid";
								break;
							case $val->shift == 'amm':
								// code...
								echo "AM / Mid";
								break;
							case $val->shift == 'all_shifts':
								// code...
								echo "Any";
								break;
								default:
									// code...
									echo "";
									break;
							} ?>
					</td>
					<td>

	<?php 
		$today = strtotime("Today")." Today";

		$db = strtotime($val->date)." DB";

		$payperiods = get_payperiods('17 Dec 2023', '30 Dec 2023');

		$plus_days = strtotime("+48 days", (int)$today);
	?>
		<?php if($plus_days >= $db):?>
			<i class='fa-solid fa-lock float-end p-1' style='color: black;font-size: 20px; margin-right: 5px;'></i>
		<?php else:?>

			<a class="link-light" href="<?=ROOT?>/volunteerot/delete/<?=$val->id?>/1">
				<button class="btn btn-sm float-end" name="votdelete"><i class="fa-solid fa-delete-left" style="color: red; font-size: 23px;"></i></button>
			</a>

		<?php endif;?>
			</td>
		<?php endif;?>

		<?php endforeach;?>
				<?php else:?>
					<div class="alert alert-primary" role="alert" style="margin-top: 100px;">
					 <h4 class="text-center">Selections are Empty<br>Go Make Some!</h4>
					</div>
						<!-- <center><h4 class="border" style="margin-top:100px; color: white; background-color: red;">No Selections Found</h4></center> -->
				<?php endif;?>
			</table>
		</div>