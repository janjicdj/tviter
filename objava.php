<?php
require "baza.php";
require "objava/Objava.php";
require "korisnik/Korisnik.php";
require "komentar/Komentar.php";


session_start();

if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tviter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Objava</h1>
    </div>

    <div class="navigacija d-flex justify-content-between">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pocetna.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="izmenaNaloga.php">Izmeni nalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="odjava.php">Odjavi se</a>
            </li>
        </ul>
        <div class="ulogovaniKorisnik">
            <p>Ulogovani korisnik <?=$_SESSION['current_user']?></p>
        </div>
    </div>
</div>

<div class="sadrzaj">
    <form class="objava" id="objavaStrana">
        <?php
        $objava=Objava::getObjava($_GET['idObjave'],$conn);
        $korisnik=Korisnik::getKorisnik($objava[0]['korisnik'],$conn); ?>
        <input type="hidden" name="idObjave" value="<?=$objava[0]['id']?>">
        <div class="objava-korisnik">
            <input type="hidden" name="korisnik" value="<?=$korisnik[0]['id']?>">
            <p>Korisnik: <?=$korisnik[0]['username']?></p>
        </div>
        <div class="objava-tekst">
            <?php
            if($_SESSION['current_user']==$korisnik[0]['username']){?>
                <div class="input-group" id="inputObjava">
                    <textarea class="form-control" name="tekstobjave" placeholder="Unesi objavu"><?=$objava[0]['tekstobjave']?></textarea>
                </div>

          <?php  }else{
            ?>
            <p><?=$objava[0]['tekstobjave']?></p>
            <?php }?>
        </div>
        <div class="objava-vreme">
            <p>Vreme objave: <?=$objava[0]['vreme']?></p>
        </div>
        <?php
        if($_SESSION['current_user']==$korisnik[0]['username']){?>
            <button class="btn btn-primary" type="submit">Izmeni</button>
            <button class="btn btn-danger" type="button" id="obrisiObjavu">Obrisi</button>
        <?php }
        ?>

    </form>

    <form class="objava" id="komentarForm">
        <input type="hidden" name="korisnik" value="<?=$_SESSION['current_user_id']?>">
        <input type="hidden"  name="objava" value="<?=$_GET['idObjave']?>">
       <div class="input-group">
           <textarea class="form-control" placeholder="Unesi komentar" name="tekstkomentara"></textarea>
       </div>
        <br>
        <button class="btn btn-success" type="submit">Dodaj komentar</button>
    </form>

    <div class="objave">
        <p class="naslov-komentari">Komentari: </p>
        <?php
        $komentari = Komentar::getAll($_GET['idObjave'],$conn);

        while(($komentar=$komentari->fetch_assoc())!=null){ ?>

            <form class="objava">
                <?php $korisnik=Korisnik::getKorisnik($komentar['korisnik'],$conn); ?>
                <input type="hidden" name="idKomentara" value="<?=$komentar['id']?>">
                <div class="komentar-korisnik">
                    <p>Korisnik: <?=$korisnik[0]['username']?></p>
                </div>
                <div class="komentar-tekst">
                    <p><?=$komentar['tekstkomentara']?></p>
                </div>

                <?php

                if($_SESSION['current_user_id']==$komentar['korisnik']){?>
                    <button class="btn btn-danger" type="button" onclick="obrisiKomentar(<?=$komentar['id']?>)">Obrisi komentar</button>
                <?php }?>

            </form>

        <?php }?>
    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/objava.js"></script>
</body>
</html>
