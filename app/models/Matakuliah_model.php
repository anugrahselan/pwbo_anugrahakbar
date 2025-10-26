<?php
class Matakuliah_model {
    private $table = 'matkul_2411500039';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMatakuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMatakuliah($data)
    {
        $query = "INSERT INTO $this->table (kode_mk, nama_mk, jns_mk, sks) 
          VALUES (:kode_mk, :nama_mk, :jns_mk, :sks)";

        $this->db->query($query);
        $this->db->bind('kode_mk', $data['kode_mk']);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('jns_mk', $data['jns_mk']);
        $this->db->bind('sks', $data['sks']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}