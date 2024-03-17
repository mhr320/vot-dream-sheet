<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div class="container-fluid" style="margin-top: 60px;">
	<h2 class="text-center">Schedule Management</h2>
	<?php

		show($schedules1[0]);

	?>
</div>

<?php $this->view('includes/footer')?>
