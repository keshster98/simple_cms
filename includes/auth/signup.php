<?php
    // Connecting to the database.
    $database = connectToDB();

    // Get the user entered data from the signup page.
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    /* Not in use due to JScript function to detect if all the fields are filled.

    // Check if the user has filled up all the fields.
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)){
        setError("Please ensure all the fields are filled up!", "/signup");
    } 

    */

    // Check if the user's password matches the confirm password.
    if ($password !== $confirm_password){
        setError("Your password does not match the confirmation, try again!", "/signup");

    // Check if the password is at least 8 characters long or more.
    } else if (strlen($password) < 8){
        setError("Please ensure your password is 8 characters long or more!", "/signup");

    // Update the database with the new user details if all the above checks have passed.
    } else {

        // Check if the email entered is already in the database.

        // SQL Command.
        $sql = "SELECT * FROM users WHERE email = :email";

        // Prepare the SQL query.
        $query = $database->prepare($sql);

        // Execute the SQL query.
        $query->execute([
            'email' => $email
        ]);

        // Fetch the table row from the database containing the first matching result.
        $user = $query->fetch();

        // Send an error message if the email is found in the database.
        if ($user){
            setError("This email is already in use, please sign up with another email!", "/signup");
        }

        // Process sign up if the email is not found in the database.
        else {

            // SQL Command.
            $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";

            // Prepare the SQL query.
            $query = $database->prepare($sql);

            // Execute the SQL query.
            $query->execute([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            
            // Send a success message for a successful account creation to the user, redirecting them to the login page.
            setSuccess("Account has been successfully created!<br>You may login with your set credentials.", "/login");
        }
    }
?>