<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('Transaksi_model');
        $this->load->helper('tanggal');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->Transaksi_model->laporan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index');
        $this->load->view('templates/footer');
    }

    public function exportPDF()
    {
        $this->load->library('dompdf_gen');
        $data['transaksi'] = $this->Transaksi_model->pdf();

        $this->load->view('laporan/laporan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_penjualan.pdf", array('Attachment' => 0));
    }
}
