<?php

class User_model extends CI_Model
{
    public function getDataProduk()
    {
        return $this->db->get_where('produk', ['stok !=' => 0])->result_array();
    }

    public function getProdukById($id)
    {
        $this->db->select('produk.*, kategori.nm_kategori');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori');
        return $this->db->get_where('produk', ['produk.id' => $id])->row_array();
    }

    public function getProdukPria()
    {
        $this->db->where('id_kategori', 1);
        $this->db->where('stok !=', 0);
        return $this->db->get('produk')->result_array();
    }

    public function getProdukWanita()
    {
        $this->db->where('id_kategori', 2);
        $this->db->where('stok !=', 0);
        return $this->db->get('produk')->result_array();
    }

    public function getProdukKerajinan()
    {
        $this->db->where('id_kategori', 4);
        $this->db->where('stok !=', 0);
        return $this->db->get('produk')->result_array();
    }

    public function getProdukTerbaru()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $this->db->where('stok !=', 0);
        return $this->db->get('produk')->result_array();
    }


    public function getAlamat($id)
    {
        $this->db->select('alamats.*, users.id, tb_kota.*, tb_provinsi.*');
        $this->db->from('alamats');
        $this->db->join('users', 'users.id = alamats.id_user');
        $this->db->join('tb_kota', 'alamats.kota = tb_kota.id_kota');
        $this->db->join('tb_provinsi', 'alamats.provinsi = tb_provinsi.id_provinsi');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahAlamat()
    {
        $data = [
            "id_user" => $this->input->post('id_user'),
            "alamat" => $this->input->post('alamat'),
            "telepon" => $this->input->post('telepon'),
            "provinsi" => $this->input->post('provinsi'),
            "kota" => $this->input->post('kota'),
            "kodepos" => $this->input->post('kodepos'),
        ];

        $this->db->where('id_alamat', $this->input->post('id_alamat'));
        $this->db->update('alamats', $data);
    }

    public function tambahAlamat()
    {
        $data = [
            "id_user" => $this->input->post('id_user'),
            "alamat" => $this->input->post('alamat'),
            "telepon" => $this->input->post('telepon'),
            "provinsi" => $this->input->post('provinsi'),
            "kota" => $this->input->post('kota'),
            "kodepos" => $this->input->post('kodepos'),
        ];

        $this->db->insert('alamats', $data);
    }

    public function checkout()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "no_trans" => $this->input->post('notrans'),
            "id_user" => $this->input->post('id_user'),
            "id_alamat" => $this->input->post('id_alamat'),
            "tanggal" =>  date('Y-m-d'),
            "total" => $this->cart->total(),
            "ongkir" => $this->input->post('ongkir'),
            "totalbayar" => $this->input->post('bayar'),
            "id_status" => 1
        ];

        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = [
                "id_transaksi" => $id_transaksi,
                "id_produk" => $item['id'],
                "nama" => $item['name'],
                "jumlah" => $item['qty'],
                "harga" => $item['price'],
                "ukuran" => $item['size']
            ];

            $this->db->insert('pesanan', $data);
        }
    }

    public function pesanan($id)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('transaksi', ['id_user' => $id])->result_array();
    }

    public function getKodeTransaksi($trans)
    {
        return $this->db->get_where('transaksi', ['no_trans' => $trans])->row_array();
    }

    public function getIdTransaksi($id)
    {
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    public function editDataDiri($id)
    {
        if ($_FILES['foto']['name'] != "") {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            //memanggil library upload
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            } else {
                $_data = ['upload_data' => $this->upload->data()];
                $data = [
                    'foto' => $_data['upload_data']['file_name']
                ];

                $data = [
                    "nama" => $this->input->post('nama', true),
                    "foto" => $_data['upload_data']['file_name']
                ];


                $_gambar = $this->db->get_where('users', ['id' => $id])->row();
                $this->db->where('id', $id);
                $query = $this->db->update('users', $data);

                if ($query) {
                    unlink("assets/img/produk/" . $_gambar->gambar);
                }
            }
        } else {
            $data = [
                "nama" => $this->input->post('nama', true),
            ];


            $this->db->where('id', $id);
            $this->db->update('users', $data);
        }
    }

    public function uploadBukti()
    {
        $config['upload_path'] = './assets/img/bukti/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            echo $this->upload->display_errors();
        } else {
            $_data = ['upload_data' => $this->upload->data()];
            $data = [
                'bukti' => $_data['upload_data']['file_name']
            ];

            $this->db->where('no_trans', $this->input->post('kode'));
            $this->db->update('transaksi', $data);
        }
    }

    public function get_user()
    {
        return $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function pesananSampai($id)
    {
        $data = ['id_status' => 4];
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }
}
