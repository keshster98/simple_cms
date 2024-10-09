<?php
  // Start session.
  session_start();

  // Require the function.
  require "includes/functions.php";

  // Getting the current path the user is on.
  $path = $_SERVER["REQUEST_URI"];

  // Removes query strings ("?" is removed) at the end of URLs.
  $path = parse_url($path, PHP_URL_PATH);

/*  Totally removes ?, even after form submission.

  if ($path !== $clean_path){
    // Redirect to the URL without the query string (on the search bar you won't even see ?)
    header("Location: " . $clean_path);
    exit();
  }

*/

  // Routing
  switch ($path){
    // Actions
    case "/auth/signup":
      require "includes/auth/signup.php";
      break;
    case "/auth/login":
      require "includes/auth/login.php";
      break;
    case '/user/add':
      require 'includes/user/add.php';
      break;
    case '/user/delete':
      require 'includes/user/delete.php';
      break;
    case '/user/edit':
      require 'includes/user/edit.php';
      break;
    case '/user/changepwd':
      require 'includes/user/changepwd.php';
      break;
    // Pages
    case "/dashboard":
      require "pages/dashboard.php";
      break;
    case "/login":
      require "pages/login.php";
      break;
    case "/logout":
      require "pages/logout.php";
      break;
    case "/manage-posts-add":
      require "pages/manage-posts-add.php";
      break;
    case "/manage-posts-edit":
      require "pages/manage-posts-edit.php";
      break;
    case "/manage-posts":
      require "pages/manage-posts.php";
      break;
    case "/manage-users-add":
      require "pages/manage-users-add.php";
      break;
    case "/manage-users-changepwd":
      require "pages/manage-users-changepwd.php";
      break;
    case "/manage-users-edit":
      require "pages/manage-users-edit.php";
      break;
    case "/manage-users":
      require "pages/manage-users.php";
      break;
    case "/post":
      require "pages/post.php";
      break;
    case "/signup":
      require "pages/signup.php";
      break;
    // Reroutes to home if the path is not found
    default :
      require "pages/home.php";
      break;
  }