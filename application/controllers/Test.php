<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	
	public function affich($_roots = '')
	{
        
		$this->load->view($_roots);
	}
}
