<?php

require "config.php";
if($_POST) {
    $title = $_POST["title"];
    $desc = $_POST["description"];
    $id = $_POST["id"];

    $pdoStmt = $pdo->prepare("UPDATE note SET title='title', description='$desc' WHERE id='$id' ");
} else {
    $pdoStmt = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET["id"]);
    $pdoStmt->execute();
    $result = $pdoStmt->fetchAll();
}

?>