<?php  
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=search_engine', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
