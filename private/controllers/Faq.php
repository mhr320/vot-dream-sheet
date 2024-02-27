<?php
/**
 * Faq controller
 */
class Faq extends Controller
{	

	public function index()
	{
		$faq = new Faq_model();

		$faqs = $faq->findAll();

		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		if(count($_POST) > 0) {

			$data['question'] = $_POST['faq'];
			$data['answer'] = $_POST['faqa'];
			$data['ois'] = $_SESSION['USER']->ois;

			$faq->insert($data);

			$this->redirect('faq');
		}

		echo $this->view('faq',[
			'faqs'=>$faqs,
		]);
	}

	public function delete($id) {

		$faq = new Faq_model;

		$faq->delete($id);

		$this->redirect('faq');
	}

	public function edit($id) {

		if(isset($id)) {

			$faq = new Faq_model;

			$edit_data = $faq->where("id", $id);

			echo $this->view('faq_edit',[
						'edit_data'=>$edit_data[0],
					]);

			if(count($_POST) > 0) {

				if($_SESSION['USER']->ois != $edit_data->ois) {

					$data['ois'] = $_SESSION['USER']->ois;
					$data['question'] = $_POST['faq'];
					$data['answer'] = $_POST['faqa'];

					$faq->faqUpdate($id, $data);

				} else {

					$data['question'] = $_POST['faq'];
					$data['answer'] = $_POST['faqa'];

					$faq->faqUpdate($id, $data);

					$this->redirect(ROOT."/faq");
				}

				
			}

		}
	}

}