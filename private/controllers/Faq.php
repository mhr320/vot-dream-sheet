<?php
/**
 * Faq controller
 */
class Faq extends Controller
{	

	function index()
	{
		$faq = new Faq_model();

		$faqs = $faq->findAll();

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		echo $this->view('faq',[
			'faqs'=>$faqs,
		]);
	}
}