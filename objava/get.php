<?php

require "../baza.php";
require "Objava.php";

if(isset($_POST['id'])){

    $obj = Objava::getObjava($_POST['id'],$conn);

    echo json_encode($obj);

}

?>