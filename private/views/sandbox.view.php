<?php $this->view('includes/header')?>

<div class="container-fluid">

	<h1 class="text-center" style="margin-top: 100px;">Sandbox</h1>

</div>
<div class="container-fluid justify-content-center shadow shadow-lg rounded border border-rounded border-3" style="width: 325px;margin-top: 100px;">
<div class="container-fluid p-3" style="width: 300px;">

<form method="post">

	<select  class="form-control text-center my-3 border border-3 border-black" name="trimester" id="trimester">

		<option class="form-control" id="trimester0" value="">Select Trimester</option>
		<option class="form-control" id="trimester1" value="1">Trimester 1</option>
		<option class="form-control" id="trimester2" value="2">Trimester 2</option>
		<option class="form-control" id="trimester3" value="3">Trimester 3</option>

	</select>

	<select class="form-control text-center my-3 border border-3 border-black" name="initials" id="initials">
	</select>

	<button class="btn btn-primary my-4 border border-black border-3 text-white shadow shadow-lg fw-bold" style="width: 275px;">SUBMIT</button>
</form>


</div>
	
</div>
<?php $this->view('includes/footer')?>
