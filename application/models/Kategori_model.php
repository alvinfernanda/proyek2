<?php

class Kategori_model extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array();
    }

    public function tambahKategori()
    {
        $data = [
            "nm_kategori" => $this->input->post('nama')
        ];

        $this->db->insert('kategori', $data);
    }

    public function editKategori()
    {
        $data = [
            "nm_kategori" => $this->input->post('nama')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kategori', $data);
    }

    public function hapusKategori($id)
    {
        $this->db->delete('kategori', ['id' => $id]);
    }
}
