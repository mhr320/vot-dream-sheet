<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div style="min-width: 350px;">
	<div class="row container-fluid justify-content-center">
		<div class="p-4" style="margin-top:50px;width:100%;max-width: 1500px;">
			<h1 style="margin-bottom: 80px;" class="h1 text-center p-4 text-decoration-underline">To The Numbers FAQ</h1>
			<?php $i=1?>
			<?php if($faqs): ?>
			<?php foreach($faqs as $key => $faq):?>
				<?php if(Auth::isAdmin() || Auth::isSuper()): ?>
						<a class="link-light" href="<?=ROOT?>/faq/edit/<?=$faq->id?>">
							<button class="btn btn-sm btn-primary float-end" name="edit"><i class="fa fa-edit"></i></button>
						</a>
						<a class="link-light" href="<?=ROOT?>/faq/delete/<?=$faq->id?>">
						<button class="btn btn-sm btn-danger float-end mx-3" name="delete"><i class="fa fa-trash"></i></button>
						</a>
				<?php endif; ?>
				<p class="fw-bold"><?=$i?>. <?=$faq->question?> <span style="font-size: 10px;" class="fst-italic">(By: <?=strtoupper($faq->ois)?>)</span></p>
				<p style="margin-bottom: 20px;" class="fw-lighter fst-italic mx-4"><?=$faq->answer?></p>
				<hr>
				<?php ++$i?>
			<?php endforeach;?>
			<?php endif;?>
		</div>

		<?php if(Auth::isAdmin() || Auth::isSuper()): ?>
			<div class="container-fluid" style="width: 600px;">
				<form method="post">
					<div class="mb-2">
						<label for="faq" class="form-label">Enter New FAQ</label>
						<input class="form-control" type="text" id="faq" name="faq" maxlength="700">
						<label for="faq" class="form-label">Enter FAQ Answer</label>
						<input class="form-control" type="text" id="faqa" name="faqa" maxlength="700">
					</div>
					<button type="submit" class="btn btn-primary float-end">Submit</button>
				</form>
			</div>
		<?php endif; ?>

	</div>
	
</div>
<!-- Comment to check git -->
<?php $this->view('includes/footer')?>