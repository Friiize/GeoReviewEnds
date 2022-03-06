<?php
    require "connexion.php";

    function create_user ($username, $password, $conn) {
        $insert = "INSERT INTO users (username, password) VALUES (${username}, ${password})";
        $conn->query($insert);
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
