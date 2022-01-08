<?php

class Komentar
{
    public $id;
    public $objava;
    public $korisnik;
    public $tekstkomentara;


    public function __construct($id=null, $objava=null, $korisnik=null, $tekstkomentara=null)
    {
        $this->id = $id;
        $this->objava = $objava;
        $this->korisnik = $korisnik;
        $this->tekstkomentara = $tekstkomentara;
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO komentari (objava,korisnik,tekstkomentara) 
                 VALUES ('$this->objava','$this->korisnik','$this->tekstkomentara');";
        return $conn->query($upit);
    }


    public function delete(mysqli $conn){
        $upit = "DELETE FROM komentari WHERE id=$this->id";
        return $conn->query($upit);
    }

    public static function getAll($idObjave,mysqli $conn)
    {
        $upit = "SELECT * FROM komentari where objava=$idObjave";
        return $conn->query($upit);
    }


    public static function getKomentar($id, mysqli $conn){
        $upit = "SELECT * FROM komentari WHERE id=$id";

        $komentar = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $komentar[]= $red;
            }
        }

        return $komentar;
    }


}