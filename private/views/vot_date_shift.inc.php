<form class="form-control" action="" method="post">
	<select class="my-3 form-control" name="votday" autofocus>
		<option value="" class="text-center">Select Date</option>
		<?php foreach($rdos as $day):?>
			<option <?=get_select('votday', date("Y-m-d",strtotime($day)))?> value="<?=date("Y-m-d",strtotime($day))?>"><?=date("j M Y (D)",strtotime($day))?></option>
		<?php endforeach;?>
	</select>

	<select class="my-3 form-control" name="shift" id="shift">
		<option value="" class="text-center">Select Shift</option>
		<option <?=get_select('shift','am')?>   value="am">Morning Shift</option>
		<option <?=get_select('shift','pm')?>   value="pm">Evening Shift</option>
		<option <?=get_select('shift','mid')?> value="mid">Midnight Shift</option>
		<!-- <option //get_select('shift','ampm')?> value="ampm">Morning & Evening</option> -->
		<!-- <option //get_select('shift','pmm')?> value="pmm">Evening & Midnight</option> -->
		<!-- <option //get_select('shift','amm')?> value="amm">Morning & Midnight</option> -->
		<!-- <option //get_select('shift','all_shifts')?>  value="all_shifts">All</option> -->
	</select>
		
		<!-- <a class="link-light" href="#">
			<button name="volunteer" type="submit" class="btn btn-success float-end">Volunteer</button>
		</a> -->
		<input class="btn btn-success float-end" type="submit" name="vot" value="VOLUNTEER">
		<input class="btn btn-dark" type="submit" name="votcancel" value="CANCEL">
	
</form>
