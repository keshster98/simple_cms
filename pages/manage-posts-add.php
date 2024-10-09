<?php
  checkIfuserIsNotLoggedIn("You must be logged in to manage posts!", "/login");
  require "parts/header.php" 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-center align-items-center mb-2">
    <h1 class="h1">Add New Post</h1>
  </div>
  <hr style="border-top: 3px solid black;">
  <div class="card mb-2 p-3 shadow-lg">
    <form>
      <div class="mb-3">
        <label for="post-title" class="form-label"><strong>Title</strong></label>
        <input type="text" class="form-control" name="post-title" id="post-title" oninput="enableAddPostButton()" placeholder="Enter your title"/>
      </div>
      <div class="mb-3">
        <label for="post-content" class="form-label"><strong>Content</strong></label>
        <textarea class="form-control" name="post-title" id="post-content" oninput="enableAddPostButton()" placeholder="Enter your content" rows="10"></textarea>
      </div>
      <div class="d-flex justify-content-between pt-3">
        <a href="/manage-posts" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Posts</a>
        <button type="submit" class="btn btn-sm btn-primary p-2" style="width: 48%;" id="addPostButton" disabled><i class="bi bi-file-earmark-plus" style="margin-right: 5px;"></i> Add Post</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Function to enable the add post button.
  function enableAddPostButton(){

      // Store the inputs from the add post page.
      const title = document.getElementById("post-title").value;
      const content = document.getElementById("post-content").value;
      const addPostButton = document.getElementById("addPostButton");
      
      // Check if both the fields are filled.

      // Enable the add post button if both the fields are filled.
      if (title && content) {
          addPostButton.disabled = false;

      // Disable the add post button if both the fields are not filled.
      } else {
          addPostButton.disabled = true;
      }
  }
</script>

<?php require "parts/footer.php" ?>
