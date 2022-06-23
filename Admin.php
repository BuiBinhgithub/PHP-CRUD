<?php

include_once __DIR__ . './DB.php';
include_once __DIR__ . './helper.php';


class Admin
{
    static public function Login($res)
    {
        $sql = "SELECT * FROM admin WHERE username = :username AND password = :password LIMIT 1";
        $users = DB::execute($sql,$res);
        return $users;
    }
}
