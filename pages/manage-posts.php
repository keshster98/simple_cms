<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage posts!", "/login");
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="text-start shadow">
      <a href="/dashboard" class="btn btn-dark btn-sm shadow-lg p-2"><i class="bi bi-chevron-left"></i><i class="bi bi-clipboard-data" style="margin-right: 5px;"></i> Dashboard</a>
    </div>
    <h1 class="h1 mb-4 text-center">Manage Posts</h1>
    <div class="text-start shadow">
      <a href="/manage-posts-add" class="btn btn-primary btn-sm p-2"><i class="bi bi-file-earmark-plus" style="margin-right: 5px;"></i> Add New Post</a>
    </div>
  </div>
  <hr style="border-top: 3px solid black;">
  <div class="card mb-2 p-3 shadow-lg">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col" style="width: 40%;">Title</th>
          <th scope="col">Status</th>
          <th scope="col" class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Post 1</td>
          <td><span class="badge bg-success">Publish</span></td>
          <td class="text-end">
            <div class="buttons">
              <a href="/post" class="btn btn-primary btn-sm me-2"><i class="bi bi-eye"></i></a>
              <a href="/manage-posts-edit" class="btn btn-secondary btn-warning btn-sm me-2"><i class="bi bi-pencil"></i></a>
              <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php require "parts/footer.php" ?>
