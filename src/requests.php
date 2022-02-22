<?php
    require './lib/nusoap.php';

    require 'login.php';
    require 'reviews.php';

    $server = new nusoap_server();

    $server->configureWSDL("ServerSoap","urn:ServerSoap");

    $server->register(
        "login",
        array("username"=>"xsd:string", "password"=>"xsd:string"),

        array("return"=>"xsd:string")
    );

    $server->register(
        "set_obj_file",
        array("username" => "xsd:string", "name" => "xsd:string", "path" => "xsd:string", "geoloc" => "xsd:string", "review" => "xsd:string")
    );

    $server->register(
        "get_objs_files",
        array("username" => "xsd:string"),
        array("return" => "xsd:Array")
    );
?>
