<?php

class Overview extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("admin/overview");
	}
}