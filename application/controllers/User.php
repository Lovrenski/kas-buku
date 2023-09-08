<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		if ($this->session->userdata('level') !== 'Admin') {
			redirect('home');
		}
	}

	public function index()
	{
		$this->db->select('*')->from('user')->order_by('nama', 'ASC');
		$user = $this->db->get()->result_array();
		$data = array('user' => $user);
		$this->template->load('layouts/template', 'user_index', $data);
	}

	public function tambah()
	{
		$this->template->load('layouts/template', 'user_tambah');
	}

	public function simpan()
	{
		$username = $this->input->post('username');
		$this->db->from('user')->where('username', $username);
		$cek = $this->db->get()->result_array();
		if ($cek <> NULL) {
			$this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Username sudah digunakan.</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
			redirect('user');
		} else {
			$this->User_model->simpan();
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Added Successfully!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$this->db->select('*')->from('user')->where('id', $id);
		$user = $this->db->get()->result_array();
		$data = ['user' => $user];
		$this->template->load('layouts/template', 'user_edit', $data);
	}

	public function update()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'level' => $this->input->post('level'),
		);
		$where = ['id' => $this->input->post('id')];
		$this->db->update('user', $data, $where);
		$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Edited Successfully!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
		redirect('user');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('user', $where);
		$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Deleted Successfully!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
		redirect('user');
	}
}
