<?php
class Home extends Controller { //karena class Home ini adalah controller, maka class Home ini meng-extend class Controller yang ada di dalam folder core
    public function index() 
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser(); //mengambil data dari model User_model dengan method getUser
        $this->view('templates/header', $data);
        $this->view('home/index', $data); //artinya akan memanggil file yang ada di dalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }
}