<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<div style="min-width: 350px;">
	<div class="row container-fluid justify-content-center">
		<div class="p-4" style="margin-top:50px;width:100%;max-width: 1500px;">
			<h1 style="margin-bottom: 80px;" class="h1 text-center p-4 text-decoration-underline">To The Numbers FAQ</h1>
			<?php $i=1?>
			<?php foreach($faqs as $key => $faq):?>
				<p class="fw-bold"><?=$i?>. <?=$faq->question?> <span style="font-size: 10px;" class="fst-italic">(By: <?=strtoupper($faq->ois)?>)</span></p>
				<p style="margin-bottom: 20px;" class="fw-lighter fst-italic mx-4"><?=$faq->answer?></p>
				<hr>
				<?php ++$i?>
			<?php endforeach;?>
			
		</div>
	</div>
</div>
<!-- Comment to check git -->
<?php $this->view('includes/footer')?>