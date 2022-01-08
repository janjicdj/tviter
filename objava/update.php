<?php

require "../baza.php";
require "Objava.php";

 if(isset($_POST['idObjave']) &&
    isset($_POST['tekstobjave']) &&
    isset($_POST['korisnik'])){

    $objava = new Objava($_POST['idObjave'],$_POST['tekstobjave'],$_POST['korisnik']);

    $status = $objava->update($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}

?>