<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->db->from('user')->where('username', $username);
		$user = $this->db->get()->row();
		if ($user == NULL) {
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Oops! Username not found</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
			redirect('auth');
		} else if ($user->password == $password) {
			$data = [
				'username' => $user->username,
				'nama' => $user->nama,
				'level' => $user->level,
				'id' => $user->id,
			];
			$this->session->set_userdata($data);
			redirect('home');
		} else {
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Password Incorrect</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
			redirect('auth');
		}
	}

	public function logout()
	{
		// $this->session->unset_userdata([
		// 	'id',
		// 	'username',
		// 	'nama',
		// 	'level',
		// ]);
		$this->session->sess_destroy();
		redirect('auth');
	}
}
