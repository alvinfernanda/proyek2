<?php

class Admin_model extends CI_Model
{
    public function tambahDataAdmin()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'foto' => "default.jpg",
            'aktif' => 1,
            'tgl_buat' => time()
        ];

        $this->db->insert('users', $data);
    }
}
