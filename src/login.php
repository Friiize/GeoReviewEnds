<?php
    require "connexion.php";

    function create_user ($username, $password) {
        $conn = connexion();
        $query = "Select * from users where username = ${username} AND password = ${password}";
        $res = $conn->query($query);

        $data = [];
        $index = 0;
        while($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index]=$test;
            $index=$index+1;
        }

        if (empty($data)) {
            return "Le login ou le password sont invalides.";
        } else {
            return array_values($data);
        }
    }

    function login ($username, $password) {
        $conn = connexion();
        $query = "SELECT username, password FROM users WHERE username = ${username}";
        $res = $conn->query($query);
        if (empty($res)) {
            create_user($username, $password, $conn);
            return "true";
        } else {
            $data = $res->fetch(PDO::FETCH_ASSOC);
            return ($data->password != $password) ? "false" : "true";
        }
    }
?>
