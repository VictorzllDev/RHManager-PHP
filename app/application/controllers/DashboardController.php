<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    check_login();
    check_role(['regular', 'manager']);
  }

	public function view_dashboard()
	{
    $data['title'] = 'Dashboard';
    $data['content'] = $this->load->view('dashboard/index', [], TRUE);
		$this->load->view('layouts/private/main', $data);
	}
}
