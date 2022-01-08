<?php

require "../baza.php";
require "Komentar.php";

if(isset($_POST['id'])){

    $komentar = new Komentar($_POST['id']);

    $status = $komentar->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>