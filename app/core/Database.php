<?php
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; //database handler
    private $stmt; //statement

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname.'';
        $option = [//untuk optimasi
            PDO::ATTR_PERSISTENT => true, //untuk membuat database kita koneksinya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //untuk mode error tampilkan exception
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());  //jika koneksi gagal, maka tampilkan pesan error
        }
    }    

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query); //prepare query
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type); //bind value
    }

    public function execute()
    {
        $this->stmt->execute(); //eksekusi statement
    }

    public function resultSet()
    {
        $this->execute(); //eksekusi statement
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //mengembalikan hasil query dalam bentuk array associative
    }

    public function single()
    {
        $this->execute(); //eksekusi statement
        return $this->stmt->fetch(PDO::FETCH_ASSOC); //mengembalikan hasil query dalam bentuk array associative
    }

    public function rowCount()
    {
        return $this->stmt->rowCount(); //mengembalikan jumlah baris yang terpengaruh oleh query
    }

}