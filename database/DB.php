<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=gestion-vols', 'root', '');
} catch (Exception $e) {
    echo 'Erruer de connexion' . $e->getMessage();
}
session_start();
