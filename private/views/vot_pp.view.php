<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="mx-auto shadow rounded text-center bg-light justify-content-center container-fluid" style="min-width: 350px;margin-top: 60px;width:80%;">
	<h1 class="p-3">Area 3 Volunteer Overtime by Pay Period</h1>

	<table class="table table-striped table-hover">
		<tr><th></th><th>AM</th><th>PM</th><th>Mid</th></tr>
		<?php foreach($rows as $k => $row):?>
			
			<th>Inits</th><th>Inits</th><th>Inits</th></tr>
		<?php endforeach;?>
	</table>
	
</div>


<?php $this->view('includes/footer')?>
