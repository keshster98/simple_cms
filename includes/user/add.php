<?php
    // Connecting to the database
    $database = connectToDB();

    // Get the user entered data from the add new user page.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];
    
    /* Not in use due to JScript function to detect if all the fields are filled.
    
    // Check if the user has filled up all the fields.
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)  || empty($role)){
        setError("Please ensure all the fields are filled up!", "/manage-users-add");
    }
    
    */

    // Check if the user's password matches the confirm password.
    if ($password !== $confirm_password){
        setError("Your password does not match the confirmation, try again!", "/manage-users-add");

    // Check if the password is at least 8 characters long or more.
    } else if (strlen( $password) < 8){
        setError("Please ensure your password is 8 characters long or more!", "/manage-users-add");

    // Update the database with the new user details if all the above checks have passed.
    } else {  

        // Check if the email entered is already in the database.

        // SQL Command.
        $sql = "SELECT * FROM users where email = :email";
        // Prepare the SQL query.
        $query = $database->prepare($sql);
        // Execute the SQL query.
        $query->execute([
            'email' => $email
        ]);
        // Fetch the table row from the database containing the first matching result.
        $user = $query->fetch();

        // Send an error message if the email is found in the database.
        if ($user) {
            setError("This email is already in use, please provide another email!", "/manage-users-add");

        } else {

            // SQL command.
            $sql = "INSERT INTO users (`name`,`email`,`password`,`role`) VALUES (:name, :email, :password, :role)";
            // Prepare the SQL query.
            $query = $database->prepare($sql);
            // Execute the SQL query.
            $query->execute([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ]);

            // Send a success message to the user for a successful addition of a new user into the database, whilst redirecting them back to the manage users page.
            setSuccess("New user, " . $name . " has been successfully added into the system!", "/manage-users");
            exit;
        }
    }
?>
