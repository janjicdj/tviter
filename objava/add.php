<?php

require "../baza.php";
require "Objava.php";

if(isset($_POST['tekstobjave']) &&
    isset($_POST['korisnik'])){

    $objava = new Objava(null,$_POST['tekstobjave'],$_POST['korisnik'], null);

    $status = $objava->add($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
    }

}


?>