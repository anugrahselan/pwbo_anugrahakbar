<?php

class Controller { //tolong dibedakan Controller yang kita buat disini dengan controller yang ada di dalam controller, jadi class Controller ini adalah class utama, sedangkan class-class yang nanti akan kita buat di dalam folder Controllers adalah controller yang akan di-extend ke class utama ini 
    public function view($view, $data = []) //fungsi untuk memanggil file view
    {
        require_once '../app/views/' . $view . '.php'; //memanggil file view yang ada di dalam folder views
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php'; //memanggil file model yang ada di dalam folder model
        return new $model; //mengembalikan objek dari model yang sudah dipanggil
    }

}