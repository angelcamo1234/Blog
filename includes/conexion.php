<?php

$dbHOST = 'localhost';
$dbNAME = 'blog';
$dbUSER = 'root';
$dbPASSWORD = '';

try{
    $pdo = new PDO("mysql:host=$dbHOST;dbname=$dbNAME","$dbUSER","$dbPASSWORD");
    $pdo-> exec("SET CHARACTER SET utf8");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
}

session_start();
