<?php
class Mahasiswa_model {
    private $table = 'mahasiswa';
    private$db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT *FROM ' . $this->table);
        return $this->db->resultSet(); //mengembalikan hasil query dalam bentuk array associative
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT *FROM ' . $this->table . ' where id=:id');
        $this->db->bind('id', $id); //bind value
        return $this->db->single(); //mengembalikan hasil query dalam bentuk array associative
    }

    public function tambahDataMahasiswa($data)
    {
        $query = " INSERT INTO $this->table (nama, nim, email, jurusan) VALUES (:nama, :nim, :email, :jurusan)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount(); //mengembalikan jumlah baris yang terpengaruh oleh query
    }
}
