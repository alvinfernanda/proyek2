<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->helper('tanggal');
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['produk'] = $this->User_model->getProdukTerbaru();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if (!$this->session->userdata('email')) {
            $this->cart->destroy();
        }

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/dashboard');
        $this->load->view('templates/footer_user');
    }

    public function produk()
    {
        $data['title'] = "Produk";
        $data['produk'] = $this->User_model->getDataProduk();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/produk');
        $this->load->view('templates/footer_user');
    }

    public function pria()
    {
        $data['title'] = "Produk";
        $data['produk'] = $this->User_model->getProdukPria();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/pria');
        $this->load->view('templates/footer_user');
    }

    public function wanita()
    {
        $data['title'] = "Produk";
        $data['produk'] = $this->User_model->getProdukWanita();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/wanita');
        $this->load->view('templates/footer_user');
    }

    public function kerajinan()
    {
        $data['title'] = "Produk";
        $data['produk'] = $this->User_model->getProdukKerajinan();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/kerajinan');
        $this->load->view('templates/footer_user');
    }

    public function detail($id)
    {
        $data['title'] = "Produk";
        $data['produk'] = $this->User_model->getProdukById($id);
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        // $this->tambah_keranjang($id);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/detail');
        $this->load->view('templates/footer_user');
    }

    public function keranjang($id)
    {
        $data['title'] = "Produk";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['alamat'] = $this->User_model->getAlamat($id);

        if (!$this->session->userdata('email')) {
            $this->cart->destroy();
        }

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/keranjang');
        $this->load->view('templates/footer_user');
    }

    public function tambah_keranjang($id)
    {
        $barang = $this->User_model->getProdukById($id);
        $data = array(
            'id'      => $barang['id'],
            'qty'     => $this->input->post('jumlah'),
            'price'   => $barang['harga'],
            'name'    => $barang['nm_produk'],
            'weight'    => $barang['berat'],
            'size'    => $this->input->post('ukuran'),
        );

        $this->load->view('templates/footer_user');

        $this->cart->insert($data);
        $this->session->set_flashdata('flash', 'ditambahkan ke keranjang');
        redirect('user/detail/' . $barang['id']);
    }

    public function hapus_keranjang($rowid)
    {
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->cart->remove($rowid);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Item belanja berhasil dihapus!</div>');
        redirect('user/keranjang/' . $data['user']['id']);
    }

    public function hapusSemuaKeranjang()
    {
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data keranjang belanja berhasil dihapus!</div>');
        redirect('user/keranjang/' . $data['user']['id']);
    }

    public function checkout($id)
    {
        $data['title'] = "Checkout";
        $data['alamat'] = $this->User_model->getAlamat($id);
        $data['notrans'] = $this->Transaksi_model->no_trans();
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'kota', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('kodepos', 'kode pos', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/checkout');
            $this->load->view('templates/footer_user');
        } else {
            $this->User_model->ubahAlamat();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Alamat berhasil diubah!</div>');
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            redirect('user/checkout/' . $user['id']);
        }
    }

    public function prosesInvoice()
    {
        $data['invoice'] = $this->User_model->checkout();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil dipesan</div>');
        $this->cart->destroy();

        $trans = $this->input->post('notrans');
        redirect('user/invoice/' . $trans);
    }

    public function invoice($trans)
    {
        $data['title'] = "Invoice";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['trans'] = $this->User_model->getKodeTransaksi($trans);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/invoice');
        $this->load->view('templates/footer_user');
    }

    public function pesanan($id)
    {
        $data['title'] = "Pesanan Saya";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->User_model->pesanan($id);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/pesanan');
        $this->load->view('templates/footer_js');
    }

    public function nonpesanan()
    {
        $data['title'] = "Pesanan Saya";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/nonpesanan');
        $this->load->view('templates/footer_js');
    }


    public function konfirmasi()
    {
        $data['title'] = "Konfirmasi Pembayaran";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // $data['trans'] = $this->User_model->getIdTransaksi($id);

        $this->form_validation->set_rules(
            'kode',
            'Kode Pesanan',
            'required|trim',
            array(
                'required' => '%s harus diisi!'
            )
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/konfirmasi');
            $this->load->view('templates/footer_user');
        } else {
            $notrans = $this->input->post('kode');
            $query = $this->db->get_where('transaksi', ['no_trans' => $notrans])->result();
            if ($query) {
                $this->User_model->uploadBukti();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Bukti pembayaran berhasil dikirim</div>');
                redirect('user/konfirmasi');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Kode pesanan yang anda masukan tidak ada</div>');
                redirect('user/konfirmasi');
            }
        }
    }

    public function prosesKonfirmasi()
    {
        $this->User_model->uploadBukti();
        $pesanan = $this->User_model->get_user();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Bukti pembayaran berhasil dikirim</div>');
        redirect('user/pesanan/' . $pesanan['id']);
    }

    public function tentang()
    {
        $data['title'] = "Tentang Kami";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/tentang');
        $this->load->view('templates/footer_user');
    }

    public function profil($id)
    {
        $data['title'] = "Profil";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['alamat'] = $this->User_model->getAlamat($id);
        $data['pesanan'] = $this->User_model->pesanan($id);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/profil');
            $this->load->view('templates/footer_user');
        } else {
            $this->User_model->editDataDiri($id);
            $user = $this->User_model->get_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data diri berhasil diubah!</div>');
            redirect('user/profil/' . $user['id']);
        }
    }

    public function alamatProfil($id)
    {
        $data['title'] = 'Tambah Alamat';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['alamat'] = $this->User_model->getAlamat($id);

        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'kota', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('kodepos', 'kode pos', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/alamat_profil');
            $this->load->view('templates/footer_user');
        } else {
            $this->User_model->ubahAlamat();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Alamat berhasil diubah</div>');
            redirect('user/alamatProfil/' . $data['user']['id']);
        }
    }

    public function riwayat_trans($id)
    {
        $data['title'] = "Riwayat Transaksi";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->User_model->pesanan($id);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/riwayat_trans');
        $this->load->view('templates/footer_user');
    }

    public function detail_trans($id)
    {
        $data['title'] = "Riwayat Transaksi";
        $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->Transaksi_model->getPesananById($id);
        $data['trans'] = $this->Transaksi_model->getTransaksiById($id);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/navbar_user');
        $this->load->view('user/detail_trans');
        $this->load->view('templates/footer_user');
    }

    public function ganti_password()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/ganti_password');
            $this->load->view('templates/footer_user');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password yang anda masukan salah!</div>');
                redirect('user/ganti_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('user/ganti_password');
                } else {
                    //passwordnya sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    //apa yang diubah (password)
                    $this->db->set('password', $password_hash);
                    //update .. where
                    $this->db->where('email', $this->session->userdata('email'));
                    //query update
                    $this->db->update('users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah</div>');
                    redirect('user/ganti_password');
                }
            }
        }
    }

    public function pesanan_sampai($id)
    {
        $this->User_model->pesananSampai($id);
        $id_transaksi = $this->User_model->getIdTransaksi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Terima kasih sudah berbelanja di Batik Mulya</div>');
        redirect('user/detail_trans/' . $id_transaksi['id']);
    }

    public function tambahAlamat()
    {
        $data['title'] = 'Tambah Alamat';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'kota', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('kodepos', 'kode pos', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/navbar_user');
            $this->load->view('user/tambah_alamat');
            $this->load->view('templates/footer_user');
        } else {
            $this->User_model->tambahAlamat();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Alamat berhasil ditambahkan</div>');
            redirect('user/checkout/' . $data['user']['id']);
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('user');
    }

    public function get_provinsi()
    {
        $this->load->library('rajaongkir');
        $provinces = $this->rajaongkir->province();
        $this->output->set_content_type('application/json')->set_output($provinces);
    }

    public function get_kota($id_provinsi)
    {
        $this->load->library('rajaongkir');
        $kota = $this->rajaongkir->city($id_provinsi);
        $this->output->set_content_type('application/json')->set_output($kota);
    }

    public function get_biaya($asal, $tujuan, $berat, $kurir)
    {
        $this->load->library('rajaongkir');
        $ongkir = $this->rajaongkir->cost($asal, $tujuan, $berat, $kurir);
        $this->output->set_content_type('application/json')->set_output($ongkir);
    }
}
