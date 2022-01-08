<?php

require "../baza.php";
require "Objava.php";

if(isset($_POST['id'])){

    $objava = new Objava($_POST['id']);

    $status = $objava->delete($conn);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}

?>