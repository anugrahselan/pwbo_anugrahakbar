<?php

class About extends Controller { //karena class Home ini adalah controller, maka class Home ini meng-extend class Controller yang ada di dalam folder core
    public function index($nama = 'Akbar', $pekerjaan = 'Mahasiswa') 
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data); //artinya akan memanggil file yang ada di dalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }
    
    public function page() 
    {
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page'); //artinya akan memanggil file yang ada di dalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }
}