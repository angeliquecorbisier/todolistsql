<?php

try {

$pdo = new PDO('mysql:host=localhost;dbname=todooff', 'root', '');

}catch (Exception $e) {
die('erreur: '. $e->getMessage());
}

session_start();

$_SESSION["user_id"] = "1";
?>