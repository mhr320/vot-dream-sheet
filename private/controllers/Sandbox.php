<?php
/**
 * Sandbox controller
 */
class Sandbox extends Controller
{
	
	function index()
	{
		
		echo $this->view('sandbox');
	}
}