<?php

require "../baza.php";
require "Korisnik.php";

if(isset($_POST['username'])){

    $obj = Korisnik::getKorisnik($_POST['username'],$conn);

    echo json_encode($obj);

}

?>