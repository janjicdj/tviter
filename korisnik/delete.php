<?php

require "../baza.php";
require "Korisnik.php";

if(isset($_POST['id'])){

    $korisnik = new Korisnik($_POST['id'],null,null,null,null,null,null);

    $status = $korisnik->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>