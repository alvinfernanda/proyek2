<?php

class Transaksi_model extends CI_Model
{
    public function getDataTransaksi()
    {
        $this->db->select('transaksi.*, users.nama, status.status, alamats.alamat');
        $this->db->join('users', 'users.id = transaksi.id_user');
        $this->db->join('alamats', 'alamats.id_alamat = transaksi.id_alamat');
        $this->db->join('status', 'status.id = transaksi.id_status');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    public function no_trans()
    {
        date_default_timezone_set('Asia/Jakarta');
        $sql = "SELECT MAX(MID(no_trans,9,4)) AS invoice 
                FROM transaksi 
                WHERE MID(no_trans,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->invoice) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }

        $invoice = "BM" . date('ymd') . $no;
        return $invoice;
    }

    public function tambahPesanan()
    {
        $data = [
            "id_user" => $this->input->post('id'),
            "alamat" => $this->input->post('alamat'),
            "telepon" => $this->input->post('telepon')
        ];

        $this->db->insert('alamats', $data);
    }

    public function getTransaksiById($id)
    {
        $this->db->select('transaksi.*, users.nama, alamats.alamat');
        $this->db->join('users', 'users.id = transaksi.id_user');
        $this->db->join('alamats', 'alamats.id_alamat = transaksi.id_alamat');
        $this->db->from('transaksi');
        $this->db->where('transaksi.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getTransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getIdTrans($id)
    {
        return $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    public function getStatus()
    {
        return $this->db->get_where('status', ['id !=' => 4])->result_array();
    }

    public function getPesananById($id)
    {
        return $this->db->get_where('pesanan', ['id_transaksi' => $id])->result_array();
    }

    public function editStatus($id)
    {
        $data = ['id_status' => $this->input->post('status')];
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }

    public function laporan()
    {
        $this->db->select('transaksi.*, users.nama');
        $this->db->join('users', 'users.id = transaksi.id_user');
        $this->db->from('transaksi');
        $this->db->where('id_status !=', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pdf()
    {
        $this->db->select('transaksi.*, users.nama');
        $this->db->join('users', 'users.id = transaksi.id_user');
        $this->db->from('transaksi');
        $this->db->where('id_status !=', 1);
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $this->db->where('tanggal BETWEEN "' . date('Y-m-d', strtotime($tgl1)) . '" and "' . date('Y-m-d', strtotime($tgl2)) . '"');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
