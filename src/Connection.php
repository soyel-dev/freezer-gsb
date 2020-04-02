<?php

namespace App;
use \PDO;

class Connection {

    public static function getPDO (){
        return new PDO('mysql:dbname=freezer_gsb;host=localhost;port=3308', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}