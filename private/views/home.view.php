<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<div style="min-width: 350px;">
	<div class="row container-fluid justify-content-center">
		<div class="p-4 shadow rounded" style="margin-top:60px;width:100%;max-width: 1500px;">

			<div class="jumbotron bg-gray rounded p-4" style="background-color: #F3EFEE;">
			  <h1 class="display-4">Hello <?=$_SESSION['USER']->nom ?></h1>
			  <p class="lead">This is a simple web application to record your Voluntary Overtime Dreams.</p>
			  <hr class="my-4">
			  <p>To learn more about how we are implementing these VOT wishes, click below.</p>
			  <p class="lead">
			    <a class="btn btn-primary btn-lg" href="../public/faq" role="button">FAQ</a>
			  </p>
			</div>
		</div>
	</div>
</div>

<?php $this->view('includes/footer')?>

