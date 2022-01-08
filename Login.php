<?php

class Login
{
    public static function login(mysqli $conn,$username,$password){
        return $conn->query("SELECT username,id FROM korisnici WHERE username='$username' AND password='$password'");
    }
}