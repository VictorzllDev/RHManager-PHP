<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function view_dashboard()
	{
    $data['title'] = 'Dashboard';
    $data['content'] = $this->load->view('dashboard/index', [], TRUE);
		$this->load->view('layouts/private/main', $data);
	}
}
