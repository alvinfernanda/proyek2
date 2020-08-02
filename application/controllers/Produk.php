<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Data Produk";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->Produk_model->getProduk();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|trim|numeric');
        $this->form_validation->set_rules('berat', 'berat', 'required|trim|numeric');
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Document', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('produk/index');
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->tambahProduk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil ditambahkan!</div>');
            redirect('produk');
        }
    }

    public function editProduk($id)
    {
        $data['title'] = "Edit Data Produk";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['produk'] =  $this->Produk_model->getProdukById($id);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|trim|numeric');
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('produk/editProduk');
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->editProduk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil diubah</div>');
            redirect('produk');
        }
    }

    public function detailProduk($id)
    {
        $data['title'] = "Detail Produk";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] =  $this->Produk_model->getProdukById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/detailProduk');
        $this->load->view('templates/footer');
    }

    public function hapusProduk($id)
    {
        $this->Produk_model->hapusProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Produk berhasil dihapus</div>');
        redirect('produk');
    }

    public function kategori()
    {
        $data['title'] = "Kategori Produk";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Kategori_model->getKategori();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('produk/kategori');
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->tambahKategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kategori berhasil ditambahkan!</div>');
            redirect('produk/kategori');
        }
    }

    public function editKategori($id)
    {
        $data['title'] = "Edit Data Kategori";
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] =  $this->Kategori_model->getKategoriById($id);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('produk/editKategori');
            $this->load->view('templates/footer');
        } else {
            $this->Kategori_model->editKategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kategori berhasil diubah!</div>');
            redirect('produk/kategori');
        }
    }

    public function hapusKategori($id)
    {
        $this->Kategori_model->hapusKategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kategori berhasil dihapus</div>');
        redirect('produk/kategori');
    }
}
