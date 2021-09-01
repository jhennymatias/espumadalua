<?php

function connect() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "espuma";
    $port = "3306";

    // Cria a conexão
    $conn = new mysqli($host, $user, $password, $db, $port);

    // Verifica a conexão
    if ($conn->connect_error) {
        echo("error");
        return false;
    } else {
        return $conn;
    }
}
