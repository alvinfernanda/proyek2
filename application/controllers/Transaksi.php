<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Transaksi_model');
        $this->load->model('Pembeli_model');
        $this->load->helper('tanggal');
    }

    public function index()
    {
        $data['title'] = "Data Transaksi";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['notrans'] = $this->Transaksi_model->no_trans();
        $data['status'] = $this->Transaksi_model->getTransaksi();
        $data['transaksi'] = $this->Transaksi_model->getDataTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/index');
        $this->load->view('templates/footer');
    }

    public function detailTrans($id)
    {
        $data['title'] = "Detail Transaksi";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Transaksi_model->getPesananById($id);
        $data['trans'] = $this->Transaksi_model->getTransaksiById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/detail');
        $this->load->view('templates/footer');
    }


    public function data_pembeli()
    {
        $data['title'] = "Data Pembeli";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembeli'] = $this->Pembeli_model->getPembeli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/pembeli');
        $this->load->view('templates/footer');
    }

    public function edit_status($id)
    {
        $data['title'] = "Edit Status";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['status'] = $this->Transaksi_model->getStatus();
        $data['transaksi'] = $this->Transaksi_model->getIdTrans($id);

        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('transaksi/edit_status');
            $this->load->view('templates/footer');
        } else {
            $this->Transaksi_model->editStatus($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status berhasil diubah</div>');
            redirect('transaksi');
        }
    }

    public function edit_status_pembeli($id)
    {
        $data['title'] = "Edit Status";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembeli'] = $this->Pembeli_model->getPembeliById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/edit_status_pembeli');
        $this->load->view('templates/footer');
    }

    public function proses_edit_status()
    {
        $this->Pembeli_model->editDataPembeli();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status berhasil diubah</div>');
        redirect('transaksi/data_pembeli');
    }
}
