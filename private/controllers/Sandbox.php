if(isset($_POST['months'])) {	
				$days = explode("-",$_POST['rdos']);
				$rdos = get_rdos_only($days,$_POST['months']); //get_rdos_only gets the months too
			}elseif(isset($_POST['shift'])) {
				$vot['date'] 	= 	$_POST['votday'];
				$vot['ois'] 	= 	strtolower($_SESSION['USER']->ois);
				$vot['shift'] 	=	$_POST['shift'];
				}

			if($_GET['vot'] == "cancel"){
				$this->redirect('volunteerot');
			}elseif($_GET["vot"] == "Volunteer" && $vol->validate($vot)) {

				// if($vol->validate($vot)) {
					$vol->insert($vot);
					$this->redirect('volunteerot');
				}else{
					$errors = $vol->errors;
				}