<?php
class Pembeli_model extends CI_Model
{
    public function getPembeli()
    {
        return $this->db->get_where('users', ['role_id' => 3])->result_array();
    }

    public function getPembeliById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function editDataPembeli()
    {
        $data = [
            "aktif" => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }
}
