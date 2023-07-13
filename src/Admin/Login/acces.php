<?php
    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        // Retrieve the form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform your authentication logic here
        // Example: you can check against a database or a predefined list of credentials

        // For demonstration purposes, let's assume the username is "admin" and the password is "password"
        $validUsername = 'admin';
        $validPassword = 'password';

    //Faire un e boucle qui checkera si le username et me passeword sont dans la base de donnés

        if ($username == $validUsername && $password == $validPassword) {
            // Successful login
            echo '<script>alert("Login successful!");</script>';
            // Redirect to another page
            header("Location: ../admin.html");
            exit();
        } else {
            // Invalid login credentials
            echo '<script>alert("Invalid username or password!");</script>';
            header("Location: ./login.html");
            exit();
        }
    }
    ?>
