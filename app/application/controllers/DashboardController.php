<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function index()
	{
    $data['title'] = 'Dashboard';
    $data['content'] = $this->load->view('dashboard/index', [], TRUE);
		$this->load->view('layouts/main', $data);
	}
}
