<?php

class Objava
{
    
    public $id;
    public $tekstobjave;
    public $korisnik;
    public $vreme;

    
    public function __construct($id=null, $tekstobjave=null, $korisnik=null, $vreme=null)
    {
        $this->id = $id;
        $this->tekstobjave = $tekstobjave;
        $this->korisnik = $korisnik;
        $this->vreme = $vreme;
    }

    public function add(mysqli $conn){
        $upit = "INSERT INTO objave (tekstobjave,korisnik) 
                 VALUES ('$this->tekstobjave','$this->korisnik');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE objave set tekstobjave = '$this->tekstobjave',korisnik = '$this->korisnik' WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM objave WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM objave";
        return $conn->query($upit);
    }


    public static function getObjava($id, mysqli $conn){
        $upit = "SELECT * FROM objave WHERE id=$id";

        $objave = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $objave[]= $red;
            }
        }

        return $objave;
    }


}