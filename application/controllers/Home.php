<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->library('session');
		if ($this->session->userdata() == NULL) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->template->load('layouts/template', 'dashboard');
	}
}