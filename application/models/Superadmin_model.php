<?php

class Superadmin_model extends CI_model
{
    public function getAdmin()
    {
        return $this->db->get_where('users', ['role_id' => 2])->result_array();
    }

    //memanggil admin berdasarkan id
    public function getAdminById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    //query tambah data admin
    public function tambahDataAdmin()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => $this->input->post('password'),
            'role_id' => 2,
            'foto' => "default.jpg",
            'aktif' => 1,
            'tgl_buat' => time()
        ];

        $this->db->insert('users', $data);
    }

    public function editDataAdmin()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "aktif" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }

    public function hapusDataAdmin($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function getBuktiById($id)
    {
        return $this->db->get_where('transaksi', ['id' => $id])->result_array();
    }

    public function verifBukti($id)
    {
        $pesanan = $this->db->get_where('pesanan', ['id_transaksi' => $id])->result_array();
        foreach ($pesanan as $p) {
            $this->db->select('stok');

            $this->db->where('id', $p['id_produk']);
            $query = $this->db->get('produk');
            $row = $query->result_array();

            foreach ($row as $r) {
                $stok = $r['stok'];
            }

            $jumlah = $p['jumlah'];
            $stokbaru = $stok - $jumlah;

            $this->db->where('id', $p['id_produk']);
            $this->db->update('produk', ['stok' => $stokbaru]);
        }


        $data = ["id_status" => 2];
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function penjualan_hari_ini()
    {
        // $this->db->select_sum('total');
        // $query = $this->db->get('transaksi');
        // return $query->row();
        $query = "SELECT sum(total) as total FROM transaksi WHERE tanggal = DATE(NOW()) AND id_status != 1";
        $result =  $this->db->query($query);
        return $result->row()->total;
    }

    public function produk_hari_ini()
    {
        $query = "SELECT sum(jumlah) as jumlah FROM pesanan JOIN transaksi ON pesanan.id_transaksi = transaksi.id WHERE transaksi.tanggal = DATE(NOW()) AND transaksi.id_status != 1";
        $result =  $this->db->query($query);
        return $result->row()->jumlah;
    }

    public function jumlah_pelanggan()
    {
        $this->db->where('role_id', 3);
        return $this->db->count_all_results('users');
    }

    public function jumlah_admin()
    {
        $this->db->where('role_id', 2);
        return $this->db->count_all_results('users');
    }

    public function satuhari()
    {
        $qsatuhari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 1 DAY AND id_status != 1";
        $rsatu =  $this->db->query($qsatuhari);
        return $rsatu->row()->total;
    }

    public function duahari()
    {
        $qduahari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 2 DAY AND id_status != 1";
        $rdua =  $this->db->query($qduahari);
        return $rdua->row()->total;
    }

    public function tigahari()
    {
        $qtigahari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 3 DAY AND id_status != 1";
        $rtiga =  $this->db->query($qtigahari);
        return $rtiga->row()->total;
    }

    public function empathari()
    {
        $qempathari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 4 DAY AND id_status != 1";
        $rempat =  $this->db->query($qempathari);
        return $rempat->row()->total;
    }

    public function limahari()
    {
        $qlimahari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 5 DAY AND id_status != 1";
        $rlima =  $this->db->query($qlimahari);
        return $rlima->row()->total;
    }

    public function enamhari()
    {
        $qenamhari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 6 DAY AND id_status != 1";
        $renam =  $this->db->query($qenamhari);
        return $renam->row()->total;
    }

    public function tujuhhari()
    {
        $qtujuhhari = "SELECT sum(total) as total FROM transaksi WHERE tanggal = CURDATE() - INTERVAL 7 DAY AND id_status != 1";
        $rtujuh =  $this->db->query($qtujuhhari);
        return $rtujuh->row()->total;
    }
}
