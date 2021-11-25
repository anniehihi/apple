<?php
    include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Apple</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/danhmuc.css">
  </head>
  <body>
    <header class="header">
      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a href="index.php" class="logo">TOAN NGUYEN</a></li>
          <li><a href="index.php" class="main-nav-link">Home</a></li>
          <li><a href="#" class="main-nav-link">Pages</a></li>
          <li><a href="danhmuc.php" class="main-nav-link">Shop</a></li>
          <li><a href="#" class="main-nav-link">Blog</a></li>
          <li><a href="#" class="main-nav-link">Contact</a></li>
          <li><a href="#" class="main-nav-link">Support</a></li>
        </ul>
      </nav>

      <div class="main-nav-item">

        <form action="<?php echo SITEURL; ?>search.php" method="POST">
          <input type="text" name="search" placeholder="Search for..." class="search-frm">
          <input type="submit" name="submit" value="Search" class="btn-search">
        </form>

        <!-- <a href="#">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="search"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            />
          </svg>
        </a> -->

        <!-- <a href="#">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="cart"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
        </a>
      </div> -->
    <!-- <section class="bgr">
      <div class="search-form hidden">
        <form action="" method="POST" class="search-grid">
            <input type="search" name="search" placeholder="Search for..." required class="input-search">
            <input type="submit" name="submit" value="Search" class="button-search">
        </form>
      </div>
    </section> -->
    </header>


