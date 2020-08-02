<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('Superadmin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Superadmin_model->penjualan_hari_ini();
        $data['admin'] = $this->Superadmin_model->jumlah_admin();
        $data['produk'] = $this->Superadmin_model->produk_hari_ini();
        $data['pelanggan'] = $this->Superadmin_model->jumlah_pelanggan();
        $data['satuhari'] = $this->Superadmin_model->satuhari();
        $data['duahari'] = $this->Superadmin_model->duahari();
        $data['tigahari'] = $this->Superadmin_model->tigahari();
        $data['empathari'] = $this->Superadmin_model->empathari();
        $data['limahari'] = $this->Superadmin_model->limahari();
        $data['enamhari'] = $this->Superadmin_model->enamhari();
        $data['tujuhhari'] = $this->Superadmin_model->tujuhhari();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('superadmin/index');
        $this->load->view('templates/footer');
    }

    public function dataAdmin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->Superadmin_model->getAdmin();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('superadmin/dataAdmin');
            $this->load->view('templates/footer');
        } else {
            $this->Superadmin_model->tambahDataAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Admin berhasil ditambahkan!</div>');
            redirect('superadmin/dataAdmin');
        }
    }

    public function editAdmin($id)
    {
        $data['title'] = 'Edit Data Admin';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->Superadmin_model->getAdminById($id);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        // $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[admin.email]');
        // $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('superadmin/editAdmin');
            $this->load->view('templates/footer');
        } else {
            $this->Superadmin_model->editDataAdmin();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Admin berhasil diubah!</div>');
            redirect('superadmin/dataAdmin');
        }
    }

    public function hapusAdmin($id)
    {
        $this->Superadmin_model->hapusDataAdmin($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Admin berhasil dihapus!</div>');
        redirect('superadmin/dataAdmin');
    }

    public function bukti($id)
    {
        $data['title'] = 'Bukti Pembayaran';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['bukti'] = $this->Superadmin_model->getBuktiById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('superadmin/bukti');
        $this->load->view('templates/footer');
    }

    public function verif_bukti($id)
    {
        $this->Superadmin_model->verifBukti($id);
        $this->load->view('templates/footer');
        $this->session->set_flashdata('flash', 'diverifikasi');
        redirect('transaksi');
    }
}
