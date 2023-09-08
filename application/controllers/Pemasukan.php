<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == NULL) {
			redirect('auth');
		}
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		$this->db->from('transaksi')->where('jenis_transaksi', 'Pemasukan');
		if ($level !== 'Admin') {
			$this->db->where('username', $username);
		}
		$pemasukan = $this->db->get()->result_array();
		$data = [
			'pemasukan' => $pemasukan,
		];
		$this->template->load('layouts/template', 'pemasukan', array_merge($data));
	}

	public function simpan()
	{
		$data = [
			'keterangan' => $this->input->post('keterangan'),
			'nominal' => $this->input->post('nominal'),
			'tanggal' => $this->input->post('tanggal'),
			'username' => $this->session->userdata('username'),
			'jenis_transaksi' => 'Pemasukan',
		];
		$this->db->insert('transaksi', $data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Added Successfully!</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		');
		redirect('pemasukan');
	}

	public function delete($id)
	{
		$where = ['id_transaksi' => $id];
		$this->db->delete('transaksi', $where);
		$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Deleted Successfully!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			');
		redirect('pemasukan');
	}
}
