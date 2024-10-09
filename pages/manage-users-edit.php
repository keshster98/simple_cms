<?php 
  checkIfuserIsNotLoggedIn("You must be logged in to manage users!", "/login");
  checkIfIsNotAdmin("You must be an admin to manage users!", "/dashboard");

  // Get the ID from the URL
  $id = $_GET['id'];

  // Connect to database
  $database = connectToDB();

  // Load existing user data

  // SQL command
  $sql = "SELECT * FROM users WHERE id = :id";
  // Prepare SQL query.
  $query = $database->prepare($sql);
  // Execute SQL query.
  $query->execute([
    'id' => $id
  ]);
  // Fetch the table row from the database containing the first matching result.
  $user = $query->fetch();

  require "parts/header.php"; 
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
  <div class="d-flex justify-content-center align-items-center mb-2">
    <h1 class="h1">Edit User</h1>
  </div>
  <hr style="border-top: 3px solid black;">
  <div class="card mb-3">
    <div class="card-body text-center"><strong style="color: red;">Note</strong>: Email cannot be changed.</div>
  </div>
  <div class="card mb-2 p-3">
    <form method="POST" action="/user/edit">
      <?php require "parts/error_message.php" ?>
      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label for="name" class="form-label"><strong>Name</strong></label>
            <input type="text" class="form-control" name="name" id="name" value=<?= $user["name"]; ?> />
            <input type="hidden" name="id" value="<?= $user["id"]; ?>" />
          </div>
          <div class="col">
            <label for="email" class="form-label"><strong>Email</strong></label>
            <input type="email" class="form-control" name="email" id="email" value=<?= $user["email"] ?> disabled />
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label"><strong>Role</strong></label>
        <select class="form-control" name="role" id="role">
          <option value="user" <?= $user['role'] == 'user' ? "selected" : "" ?>>User</option>
          <option value="editor" <?= $user['role'] == 'editor' ? "selected" : "" ?>>Editor</option>
          <option value="admin" <?= $user['role'] == 'admin' ? "selected" : "" ?>>Admin</option>
        </select>
      </div>
      <div class="d-flex justify-content-between pt-3">
        <a href="/manage-users" class="btn btn-dark btn-sm p-2" style="width: 48%;"><i class="bi bi-chevron-left"></i><i class="bi bi-person-gear" style="margin-right: 5px;"></i>Manage Users</a>
        <button type="submit" class="btn btn-sm btn-success p-2" style="width: 48%;" id="editButton" disabled><i class="bi bi-pencil" style="margin-right: 5px;"></i>Edit</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Store the pre-filled user data from the edit user page.
  const name = document.getElementById("name");
  const role = document.getElementById("role");
  const editButton = document.getElementById("editButton");

  // Store the original values of the user data for comparison later with the new data.
  const oldName = name.value.trim(); // .trim() removes whitespace before the first word and after the last word in the field.
  const oldRole = role.value;

  // Attach event listeners to track any changes in the fields.
  name.addEventListener("input", checkForEditUserChanges);
  role.addEventListener("input", checkForEditUserChanges);

  // Function to check if there are changes to the pre-filled user data.
  function checkForEditUserChanges(){

    const newName = name.value.trim();
    const newRole = role.value;

    // Check if the the new data (if any) is different from the old data.

    // Disable the edit button if there are no changes.
    if (newName !== oldName || newRole !== oldRole){
        editButton.disabled = false;
    
    // Enable the edit button if there are changes.
    } else {
        editButton.disabled = true;
    }
  }
</script>

<?php require "parts/footer.php" ?>
