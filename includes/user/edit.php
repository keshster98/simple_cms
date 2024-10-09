<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get user data from the edit user form.
    $name = $_POST["name"];
    $role = $_POST["role"];
    $id = $_POST["id"];

    /* Not in use due to JScript function to detect if all the fields are filled.

    // Check if the user has filled up all the fields.
    if (empty($name) || empty($role)){
        setError( "Please ensure all fields are filled up!", "/manage-users-edit?id=" . $id . "&name=" . $name);
    }
    */
  
    // Update user data

    // SQL Command
    $sql = "UPDATE users SET name = :name, role = :role WHERE id = :id";
    // Prepare SQl query.
    $query = $database->prepare( $sql );
    // Execute SQL query.
    $query->execute([
        'name' => $name,
        'role' => $role,
        'id' => $id
    ]);

    // Send a success message to the user for a successful user edit, whilst redirecting them back to the manage users page.
    setSuccess("The user details for " . $name . " has been successfully updated!", "/manage-users");
    exit;
?>