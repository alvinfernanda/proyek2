<?php

class Produk_model extends CI_Model
{
    public function getProduk()
    {
        $this->db->select('produk.*, kategori.id AS id_kategori, kategori.nm_kategori');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('produk');
        return $query->result_array();
    }

    //fungsi ambil data produk berdasarkan id
    public function getProdukById($id)
    {
        $this->db->select('produk.*, kategori.nm_kategori');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id');
        return $this->db->get_where('produk', ['produk.id' => $id])->row_array();
    }

    //fungsi untuk tambah produk
    public function tambahProduk()
    {
        $config['upload_path'] = './assets/img/produk/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        //memanggil library upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            echo $this->upload->display_errors();
        } else {
            $_data = ['upload_data' => $this->upload->data()];
            $data = [
                'nm_produk' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'berat' => $this->input->post('berat'),
                'id_kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $_data['upload_data']['file_name']
            ];

            $this->db->insert('produk', $data);
        }
    }

    // fungsi untuk edit data 
    public function editProduk()
    {
        if ($_FILES['gambar']['name'] != "") {
            $config['upload_path'] = './assets/img/produk/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            //memanggil library upload
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
            } else {
                $_data = ['upload_data' => $this->upload->data()];
                $data = [
                    'gambar' => $_data['upload_data']['file_name']
                ];

                $data = [
                    'nm_produk' => $this->input->post('nama'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'berat' => $this->input->post('berat'),
                    'id_kategori' => $this->input->post('kategori'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $_data['upload_data']['file_name']
                ];

                $id = $this->input->post('id');
                $_gambar = $this->db->get_where('produk', ['id' => $id])->row();
                $this->db->where('id', $id);
                $query = $this->db->update('produk', $data);
                if ($query) {
                    unlink("assets/img/produk/" . $_gambar->gambar);
                }
            }
        } else {
            $data = [
                'nm_produk' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'berat' => $this->input->post('berat'),
                'id_kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('produk', $data);
        }
    }

    public function hapusProduk($id)
    {
        $this->db->delete('produk', ['id' => $id]);
    }
}
