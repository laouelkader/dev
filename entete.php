<?php

include_once 'model/fonction.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>
    <?php
                echo ucfirst(str_replace(".php", "",basename($_SERVER['PHP_SELF'])));
            ?>
    </title>
    <link rel="stylesheet" href="public\css\style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
  
    <div class="sidebar ">
      <div class="logo-details">
        
        <span class="logo_name">laouel</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="article.php" >
            <i class="bx bx-box"></i>
            <span class="links_name">Article</span>
          </a>
        </li>
        <li>
          <a href="vente.php">
          <i class='bx bxs-shopping-bag'></i>
          <span class="links_name">Vente</span>
          </a>
        </li>
        <li>
          <a href="client.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="fournisseur.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Fournisseur</span>
          </a>
        </li>
        <li>
          <a href="commande.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>
      
        
        <li class="log_out">
          <a href="login.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav >
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">
          <?php
                echo ucfirst(str_replace(".php", "",basename($_SERVER['PHP_SELF'])));
            ?>
          </span>
        </div>
       
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name">Admin</span>
        </div>
      </nav>