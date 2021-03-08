<?php
require_once '../database/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap-min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="../css/solid.min.css" />
    <link rel="stylesheet" href="../css/all.min.css" />

    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
  </head>
      <div class="main">
        <div class="small">
          <?php require_once '../views/smallnav.php';?>
        </div>
        <nav >
          <img src="../images/logo.png" width="100" height="80">
          <ul>
            <li><a href="index.php">Acceuil</a></li>
            <?php if (isset($_SESSION)): ?>
              <?php if ($_SESSION['role'] == 0): ?>
              <li><a href="../views/reservation.php">Reservation</a></li>
              <?php endif;?>
            <?php endif;?>
            <li><a href="#">contact Us</a></li>
            <li><a href="#">Help Me</a></li>
          </ul>
        </nav>
      </div>