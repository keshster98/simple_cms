<?php require "parts/header.php" ?>

<div class="container mx-auto my-5" style="max-width: 800px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <?php if(isset($_SESSION["user"])): ?>
        <div class="text-start shadow">
            <a href="/dashboard" class="btn btn-dark btn-sm shadow-lg p-2"><i class="bi bi-clipboard-data" style="margin-right: 5px;"></i> Dashboard</a>
        </div>
        <h1 class="h1 mb-4 text-center"><?= $_SESSION["user"]["name"] ?>'s Blog</h1>
        <div class="text-end shadow">
            <a href="/logout" class="btn btn-danger btn-sm shadow-lg p-2"><i class="bi bi-box-arrow-right" style="margin-right: 5px;"></i>Logout</a>
        </div>
        <?php else: ?>
        <div class="text-start shadow">
            <a href="/signup" class="btn btn-success btn-sm shadow-lg p-2"><i class="bi bi-plus-circle" style="margin-right: 5px;"></i> Sign Up</a>
        </div>
        <h1 class="h1 mb-4 text-center">Blog</h1>
        <div class="text-end shadow">
            <a href="/login" class="btn btn-primary btn-sm shadow-lg p-2"><i class="bi bi-box-arrow-in-right" style="margin-right: 5px;"></i> Login</a>
        </div>
        <?php endif; ?>
    </div>
    <?php require "parts/success_message.php" ?>
    <?php require "parts/error_message.php" ?>
    <hr style="border-top: 3px solid black;">
    <?php require "parts/success_message.php" ?>
    <?php require "parts/error_message.php" ?>
    <div class="card mb-2 shadow-lg">
        <div class="card-body">
        <h5 class="card-title">Post 1</h5>
        <p class="card-text">This is for Post 1</p>
        <div class="text-end">
            <a href="#" class="btn btn-warning btn-sm p-2"><i class="bi bi-book" style="margin-right: 5px;"></i> Read More</a>
        </div>
        </div>
    </div>
</div>

<?php require "parts/footer.php" ?>