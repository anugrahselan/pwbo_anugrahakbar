<?php

class App {
    protected $controller = 'Home'; //controller default
    protected $method = 'index'; // method default
    protected $params = []; //parameter default

    public function __construct()
    {
        $url = $this->parseURL();

        //controller
        if(isset($url[0]) && file_exists('../app/controllers/'.$url[0].'.php')){ //cek dulu apakah ada file di dalam folder controllers
            $this->controller = $url[0]; //maka controller diganti sesuai dengan url
            unset($url[0]); //hapus elemen array ke1
        }

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //method 
        if(isset($url[1])) { //cek apakah ada elemen array ke 2
            if(method_exists($this->controller, $url[1])) { //cek apakah method ada di dalam controller
                $this->method = $url[1]; //maka method diganti sesuai dengan url
                unset($url[1]); //hapus elemen array ke2
            }
        }

        //params
        if(!empty($url)) { //cek apakah ada elemen array
            $this->params = array_values($url); //mengambil nilai array saja tanpa indexnya
        }

        //jalankan controlller &method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params); //fungsi untuk menjalankan sebuah callback dengan parameter yang berupa array
    }

    public function parseURL()
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL); //membersihkan url dari karakter aneh
            $url = explode('/', $url); //memecah url berdasarkan karakter '/' dan menjadikannya array
            return $url;
        }
    }

}