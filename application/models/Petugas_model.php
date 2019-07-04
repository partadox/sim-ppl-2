<?php

class Petugas_model extends CI_Model
{
    public function getAllPetugas()
    {
        $query = "SELECT user.*, user_role.role FROM user INNER JOIN user_role ON user.role_id = user_role.id ";
        return $this->db->query($query)->result_array();
    }

    public function TambahPetugas($data)
    {
        $this->db->insert('user', $data);
    }

    public function hapusDataPetugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function edit_petugas($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return true;
    }
}
