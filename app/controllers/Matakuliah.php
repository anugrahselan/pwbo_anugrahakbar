<?php
class Matakuliah extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Matakuliah';
        $data['matkul'] = $this->model('Matakuliah_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Matakuliah';
        $data['matkul'] = $this->model('Matakuliah_model')->getMatakuliahById($id);
        $this->view('templates/header', $data);
        $this->view('matakuliah/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Matakuliah_model')->tambahDataMatakuliah($_POST)
            > 0){
            header('Location: '.BASEURL.'/matakuliah');
            exit;
        }
    }
}