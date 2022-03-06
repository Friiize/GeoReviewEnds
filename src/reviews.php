<?php
    require "connexion.php";


    function set_obj_file($username, $name, $path, $geoloc, $review) {
        if (isset($username) && isset($name) && isset($path) && isset($geoloc) && isset($review)) {
            $conn = connexion();
            $query = "INSERT INTO objects (user_id, obj_name, img_path, geoloc, review) VALUES ((SELECT id FROM users WHERE username = ${username}), ${name}, ${path}, ${geoloc}, ${review})";
            $conn->query($query);
        }
    }

    function get_objs_files($username) {
        $conn = connexion();
        $query = "SELECT objects.obj_name, objects.img_path, objects.geoloc, objects.review FROM objects INNER JOIN users ON objects.user_id = users.id WHERE users.username = ${username}";
        $res = $conn->query($query);

        $data = [];
        $index = 0;
        while ($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[$index] = $test;
            $index = $index + 1;
        }

        if (empty($data)) {
            return "Item not found";
        } else {
            return array_values($data);
        }
    }

    function edit_obj_file($id, $name, $path, $geoloc, $review) {
        if (isset($id) && isset($name) && isset($path) && isset($geoloc) && isset($review)) {
            $conn = connexion();
            $query = "UPDATE objects SET obj_name = ${name}, img_path = ${path}, geoloc = ${geoloc}, review = ${review} WHERE id = ${id}";
            conn->query($query);
        }
    }

    function del_obj_file($id) {
        if (isset($id)) {
            $conn = connexion();
            $query = "DELETE FROM objects WHERE id = ${id}";
            conn->query($query);
        }
    }
?>
