<?php
require_once '_connec.php';



$pdo = new \PDO(DSN, USER, PASS);
$statement = $pdo->query("SELECT firstname,lastname FROM friend");

$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
