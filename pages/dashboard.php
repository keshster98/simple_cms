<?php
  checkIfuserIsNotLoggedIn("You must be logged in to view your dashboard", "/login");
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 800px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="text-start shadow">
      <a href="/" class="btn btn-dark btn-sm p-2"><i class="bi bi-chevron-left"><i class="bi bi-house" style="margin-right: 5px;"></i></i> Home</a>
    </div>
    <h1 class="h1 mb-4 text-center"><?= $_SESSION['user']['name'] . "'s Dashboard" ?></h1>
    <div class="text-start shadow">
      <a href="/logout" class="btn btn-danger btn-sm p-2"><i class="bi bi-box-arrow-right" style="margin-right: 5px;"></i> Logout</a>
    </div>
  </div>
  <?php require "parts/success_message.php" ?>
  <?php require "parts/error_message.php" ?>
  <hr style="border-top: 3px solid black;">
  <div class="row">
    <div class="col">
      <div class="card mb-2 shadow-lg">
        <div class="card-body">
          <h5 class="card-title text-center">
            <div class="mb-1">
              <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
            </div>
            Manage Posts
          </h5>
          <div class="text-center mt-3">
            <a href="/manage-posts" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
    </div>
    <?php if ($_SESSION['user']['role'] == 'admin'): ?>
    <div class="col">
      <div class="card mb-2 shadow-lg">
        <div class="card-body">
          <h5 class="card-title text-center">
            <div class="mb-1">
              <i class="bi bi-person-gear" style="font-size: 3rem;"></i>
            </div>
            Manage Users
          </h5>
          <div class="text-center mt-3">
            <a href="/manage-users" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php require "parts/footer.php" ?>
