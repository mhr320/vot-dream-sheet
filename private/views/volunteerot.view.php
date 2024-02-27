<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<script type="text/javascript">

	$(document).ready(function () {
		$( "#months" ).on( "change", function() {
			var rdos = $('#rdos').val();
			var month = $(this).val();
			if(!rdos) {
				alert("You must select RDOs");
				location.reload(true);
			} else {
				$.ajax({
					type:'POST',
					url:'../private/ajax/rdos_for_month.php',
					data: {
						month, rdos
					},
					success:function(data){
						$("#selectVot").html(data);
					}
				});
			}
		});
	});
	
</script>

	<div class="row container-fluid">
			<div class="col-1"></div>
				<div class="col-2 p-4 shadow rounded bg-light" style="margin-top:60px;width:100%;max-width: 340px;">
				<form method="post">	
					<h3 class="my-4 text-center">Volunteer OT Form</h3>

					<?php if(count($errors) > 0):?>
						<?php views_path('errors',['errors' => $errors])?>
					<?php endif;?>

						<img src="<?=ROOT?>/assets/Zombie" class="d-block mx-auto" style="width:100px;" >

						<select class="my-3 form-control" name="rdos" id="rdos">
							<option value="" class="text-center">Select RDO's</option>
							<option <?=get_select('rdos','sat-sun')?> value="sat-sun">Saturday & Sunday</option>
							<option <?=get_select('rdos','sun-mon')?> value="sun-mon">Sunday & Monday</option>
							<option <?=get_select('rdos','mon-tue')?> value="mon-tue">Monday & Tuesday</option>
							<option <?=get_select('rdos','tue-wed')?> value="tue-wed">Tuesday & Wednesday</option>
							<option <?=get_select('rdos','wed-thu')?> value="wed-thu">Wednesday & Thursday</option>
							<option <?=get_select('rdos','thu-fri')?> value="thu-fri">Thursday & Friday</option>
							<option <?=get_select('rdos','fri-sat')?> value="fri-sat">Friday & Saturday</option>
						</select>

						<select class="my-3 form-control" name="months" id="months">
							<option value="" class="text-center">Select Month</option>
							<?php foreach($months as $month):?>
							<option value="<?=date("m",strtotime($month))?>"><?=$month?></option>
							<?php endforeach;?>
						</select>

						<div class="selectVot" id="selectVot"></div>

				</div>
			</form>

			<div class="col-1"></div>
				<?php views_path('vot_rows_table',['rows' => $rows])?>
			<div class="col-1"></div>
			
				<div class="col- p-4 shadow rounded bg-light" style="margin-top:60px;width:100%;max-width: 350px;">

					<div class="alert alert-secondary" role="alert">
					  <h4 class="alert-heading text-center">Legend</h4>
					  <p style="color: black;"><i class='fa-solid fa-lock p-1' style='color: black;font-size: 20px; margin-right: 5px;'></i> - This VOT shift is locked and recorded, it can not be removed.</p>
					  <p style="color: black;"><i class='fa-solid fa-delete-left' style='color: red;font-size: 20px; margin-right: 5px;'></i> - You may delete this VOT shift.</p>
					  <hr>
					  <p style="color: black;"><span style="font-weight: bold;color: black;">Notes:</span> If you submit a date older than today it will be recorded but dates for VOT before today's date will not display here.</p>
					  <hr>
					  <?php $today = strtotime("Today");?>
					  <p class="mb-0" style="color: black;">If your VOT date is on or prior to<br> <span style="font-weight: bold; font-size: 18px;color: black;"><?=date("jS M Y", strtotime('+48 days',$today))?></span> <br>it will display here, but it will be locked. You will not be able to remove the VOT.</p>
					</div>

				</div>
	</div>
<?php $this->view('includes/footer')?>