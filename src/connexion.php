<?php
    function connexion () {
        $user = "root";
        $host = "127.0.0.1";
        $port = "3306";
        $pass = "";
        $db = "georeview";
        $dsn = "mysql:dbname=${db};host=${host}:${port}";
        $conn = new PDO($dsn, $user, $pass) or die("Connection Failed"); //DIE DIE DIE
        return $conn;
    }
    ?>
