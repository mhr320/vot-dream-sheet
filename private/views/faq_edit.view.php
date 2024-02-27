<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<div class="container-fluid" style="margin-top: 60px;">

<h1 class="text-center">Edit FAQ Question</h1>
			<div class="container-fluid" style="width: 600px;">
				<form method="post">
					<div class="mb-2">
						<label for="faq" class="form-label">Edit FAQ</label>
						<input value="<?=$edit_data->question?>" class="form-control" type="text" id="faq" name="faq" maxlength="700">
						<label for="faq" class="form-label">Edit FAQ Answer</label>
						<input value="<?=$edit_data->answer?>" class="form-control" type="text" id="faqa" name="faqa" maxlength="700">
					</div>
						<button type="submit" class="btn btn-primary float-end">Update</button>
				</form>
				<a class="link-light" href="<?=ROOT?>/faq">
				<button class="btn btn-dark">Return To FAQs</button>
				<a>
			</div>
</div>

<?php $this->view('includes/footer')?>