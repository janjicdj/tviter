<?php

require "../baza.php";
require "Komentar.php";

if(isset($_POST['objava']) &&
    isset($_POST['korisnik']) && isset($_POST['tekstkomentara'])){

    $komentar = new Komentar(null,$_POST['objava'],$_POST['korisnik'], $_POST['tekstkomentara']);

    $status = $komentar->add($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>