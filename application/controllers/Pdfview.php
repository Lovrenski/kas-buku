<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdfview extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
		if ($this->session->userdata('level') == NULL) {
			redirect('auth');
		}
	}

	function detail_laporan()
	{
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$tanggal1 = $this->input->post('awal');
		$tanggal2 = $this->input->post('akhir');
		$pdf = new FPDF('L', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'Detail Laporan Kas Buku', 0, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(0, 7, 'Dari tanggal ' . $tanggal1 . ' sampai ' . $tanggal2, 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(38, 6, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(75, 6, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(45, 6, 'Pemasukan', 1, 0, 'C');
		$pdf->Cell(45, 6, 'Pengeluaran', 1, 0, 'C');
		$pdf->Cell(45, 6, 'Saldo Akhir', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$query = $this->db->where('tanggal >=', $tanggal1)->where('tanggal <=', $tanggal2)->get('transaksi')->result();
		$no = 0;
		$saldo = 0;
		foreach ($query as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(38, 6, $data->tanggal, 1, 0, 'C');
			$pdf->Cell(75, 6, $data->keterangan, 1, 0);
			if ($data->jenis_transaksi == 'Pemasukan') {
				$pdf->Cell(45, 6, 'Rp. ' . number_format($data->nominal), 1, 0);
				$pdf->Cell(45, 6, 'Rp. -', 1, 0);
				$saldo = $saldo + $data->nominal;
			}
			if ($data->jenis_transaksi == 'Pengeluaran') {
				$pdf->Cell(45, 6, 'Rp. -', 1, 0);
				$pdf->Cell(45, 6, 'Rp. ' . number_format($data->nominal), 1, 0);
				$saldo = $saldo - $data->nominal;
			}
			$pdf->Cell(45, 6, 'Rp. ' . number_format($saldo), 1, 1);
		}

		$pdf->Output();
	}
	function pemasukan()
	{
		$tanggal1 = $this->input->post('awal');
		$tanggal2 = $this->input->post('akhir');
		$total = $this->db->select('sum(nominal) as total')->from('transaksi')->where('jenis_transaksi', 'Pemasukan')->get()->row()->total;
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('P', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'Laporan Pemasukan', 0, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(0, 7, 'Laporan Pemasukan dari tanggal ' . $tanggal1 . ' sampai ' . $tanggal2, 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(95, 6, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nominal', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$transaksi = $this->db->where('tanggal >=', $tanggal1)->where('tanggal <=', $tanggal2)->where('jenis_transaksi', 'Pemasukan')->get('transaksi')->result();
		$no = 0;
		foreach ($transaksi as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->tanggal, 1, 0, 'C');
			$pdf->Cell(95, 6, $data->keterangan, 1, 0);
			$pdf->Cell(50, 6, 'Rp. ' . number_format($data->nominal), 1, 1);
		}
		$pdf->Cell(145, 6, 'Total Pemasukan', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Rp. ' . number_format($total), 1, 0, 'C');

		$pdf->Output();
	}

	function pengeluaran()
	{
		$tanggal1 = $this->input->post('awal');
		$tanggal2 = $this->input->post('akhir');
		$total = $this->db->select('sum(nominal) as total')->from('transaksi')->where('jenis_transaksi', 'Pengeluaran')->get()->row()->total;
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('P', 'mm', 'Letter');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'Laporan Pengeluaran', 0, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Cell(0, 7, 'Laporan Pengeluaran dari tanggal ' . $tanggal1 . ' sampai ' . $tanggal2, 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(10, 6, 'No', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(95, 6, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Nominal', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
		$transaksi = $this->db->where('tanggal >=', $tanggal1)->where('tanggal <=', $tanggal2)->where('jenis_transaksi', 'Pengeluaran')->get('transaksi')->result();
		$no = 0;
		foreach ($transaksi as $data) {
			$no++;
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(40, 6, $data->tanggal, 1, 0, 'C');
			$pdf->Cell(95, 6, $data->keterangan, 1, 0);
			$pdf->Cell(50, 6, 'Rp. ' . number_format($data->nominal), 1, 1);
		}
		$pdf->Cell(145, 6, 'Total Pengeluaran', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Rp. ' . number_format($total), 1, 0, 'C');

		$pdf->Output();
	}
}
