<select class="my-3 form-control" name="rdos">
	<option value="" class="text-center">Select RDO's</option>
	<option <?=get_select('rdos','sat-sun')?> value="sat-sun">Saturday & Sunday</option>
	<option <?=get_select('rdos','sun-mon')?> value="sun-mon">Sunday & Monday</option>
	<option <?=get_select('rdos','mon-tue')?> value="mon-tue">Monday & Tuesday</option>
	<option <?=get_select('rdos','tue-wed')?> value="tue-wed">Tuesday & Wednesday</option>
	<option <?=get_select('rdos','wed-thu')?> value="wed-thu">Wednesday & Thursday</option>
	<option <?=get_select('rdos','thu-fri')?> value="thu-fri">Thursday & Friday</option>
	<option <?=get_select('rdos','fri-sat')?> value="fri-sat">Friday & Saturday</option>
</select>
<select class="my-3 form-control" name="months">
	<option value="" class="text-center">Select Month</option>
	<?php foreach($months as $month):?>
	<option <?=get_select('months',date("m",strtotime($month)))?> value="<?=date("m",strtotime($month))?>"><?=$month?></option>
	<?php endforeach;?>
</select>
<a class="link-light" href="<?=ROOT?>/volunteer" style="text-decoration: none;">
	<button type="submit" class="d-block mx-auto btn btn-primary">Get Dates</button>
</a>
