<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get user data from the change password form.
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $id = $_POST['id'];
    $name = $_POST["name"];

    /* Not in use due to JScript function to detect if all the fields are filled.
    
    // Check if the user has filled up all the fields.
    if (empty($password) || empty($confirm_password)){
        setError("Please ensure all fields are filled up!", "/manage-users-changepwd?id=" . $id . "&name=" . $name);
    }

    */

    // Check if the user's password matches the confirm password.
    if ($password !== $confirm_password){
        setError("Passwords do not match!", "/manage-users-changepwd?id=" . $id . "&name=" . $name);
    }

    // Update the password.
    
    // SQL command.
    $sql = "UPDATE users SET password =:password WHERE id =:id";
    // Prepare SQL query.
    $query = $database -> prepare($sql);
    // Execute SQL query.
    $query->execute([
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'id' => $id
    ]);

    // Send a success message to the user for a successful change of user password, whilst redirecting them back to the manage users page.
    setSuccess("The user password for " . $name . " has been successfuly changed!", "/manage-users");
    exit;
?>