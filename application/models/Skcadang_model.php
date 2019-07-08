<?php

class Skcadang_model extends CI_Model
{
    public function getAllSkcadang()
    {
        $query = "SELECT * FROM skcadang";
        return $this->db->query($query)->result_array();
    }

    public function getAllSkcadangKeluar()
    {
        $query = "SELECT skcadang_keluar.*, skcadang.nama_skcadang, skcadang.kode, skcadang.merk, skcadang.tipe, skcadang.daya, user.name FROM skcadang_keluar INNER JOIN skcadang ON skcadang_keluar.id_skcadang = skcadang.id INNER JOIN user ON skcadang_keluar.nama_petugas = user.id";
        return $this->db->query($query)->result_array();
    }

    public function TambahSkcadang($data)
    {
        $this->db->insert('skcadang', $data);
    }

    public function hapusDataSkcadang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('skcadang');
    }

    public function hapusDataSkcadangKeluar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('skcadang_keluar');
    }

    public function edit_skcadang($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('skcadang', $data);
        return true;
    }

    public function OptionSkcadang()
    {
        $query = "SELECT * FROM skcadang ORDER BY skcadang.nama_skcadang ASC";
        return $this->db->query($query)->result_array();
    }

    public function TambahAmbil($data)
    {
        $this->db->insert('skcadang_keluar', $data);
    }
}
