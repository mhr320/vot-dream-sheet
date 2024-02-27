<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

	<div style="min-width: 350px;">
		<div class="row container-fluid justify-content-center">
			<div class="p-4 shadow rounded" style="margin-top:50px;width:100%;max-width: 1200px;">
				<h1 style="margin-bottom: 35px;" class="text-center p-2">Volunteer Overtime Log</h1>
				<table class="table table-striped">
					<tr>
						<th>Record <br>ID</th>
						<th>Operating <br>Initials</th>
						<th><br>VOT Date</th>
						<th><br>Shift</th>
						<th>DateTime VOT <br>Recorded</th>
						<th><br>Deleted</th>
						<th>Datime VOT <br>Deleted</th>
					</tr>
					<?php foreach($allvol as $key => $val):?>
						<tr>
							<td><?=$val->id?></td>
							<td><?=strtoupper($val->ois)?></td>
							<td class=""><?=date("j M Y",strtotime($val->date))?></td>
							<td><?=$val->shift?></td>
							<td><?=date("j M y @ H:i:s", strtotime($val->datetime))?></td>
							<td><?php switch ($val) {
								case $val->shift_del == 0:
									echo "No";
									break;
								case $val->shift_del == 1:
									echo "Yes";
									break;
								
								default:
									break;
							}?>
							<td><?php if(isset($val->datetime_shift_del)):?>
									<?=date("j M y @ H:i:s",strtotime($val->datetime_shift_del))?>
								<?php endif;?>
								</td>

						</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
<?php $this->view('includes/footer')?>