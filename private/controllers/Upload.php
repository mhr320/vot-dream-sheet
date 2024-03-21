<?php
/**
 * Upload controller
 */
class Upload extends Controller
{
	
	function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
			$schedule 		= new Schedules_model;
			$success 		= array();
			$errors 			= array();
			$target_dir 		= $_SERVER['DOCUMENT_ROOT']  . 'tmp/';
			$target_file 		= $target_dir . basename ( $_FILES["fileToUpload"] ["name"] );
			$uploadOK 	= 1;
			$fileType 		= strtolower ( pathinfo ( $target_file, PATHINFO_EXTENSION ) );

			if ( isset ( $_POST [ 'submit' ] ) ) {

				// check file size
				if ( $_FILES [ 'fileToUpload' ]  [ 'size' ] > 500000 ) {
					$errors = "File too large";
					$uploadOK = 0;
				}

				// Allow certain file formats
				if ( $fileType != "csv" ) {
			  	$errors = "Only CSV files are allowed.";
			  	$uploadOK = 0;
				}

				// Overwrite existing file
				if ( file_exists ( $target_file ) ) {
					unlink ( $target_file ); 
				}

				// Check if $uploadOK is set to 0 by an error
				if ( $uploadOK == 0 ) {
				  $errors = "Your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				  if ( move_uploaded_file ( $_FILES["fileToUpload"] ["tmp_name"], $target_file ) ) {
				  	cleanCSV ( getTriNum ( $target_file ), transferCSV ( $target_file ) );
				    $successes = ["The file ". htmlspecialchars ( basename ( $_FILES["fileToUpload"] ["name"] ) ). " has been uploaded."];
				  } else {
				    $errors = "There was an error uploading your file.";
					}
				}
			}
			echo $this->view('upload', [ 
				'errors' 		=> $errors,
				'successes' => $successes,
				 ] );
	}
}