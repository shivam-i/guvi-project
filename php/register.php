<?php
require_once 'connection.php';
// We need to check if the account with that username exists.
if ($stmt = $conn->prepare('SELECT username, password FROM demo.demo_table WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo 'Username exists, please choose another!';
    } else {
        // Insert new account
        if (isset($_POST["username"]) && isset($_POST["age"]) && isset($_POST["dob"]) && isset($_POST["email"]) && isset($_POST["password"]))
            {
            $username = $_POST["username"];
            $age = $_POST["age"];
            $dob = $_POST["dob"];
            $email = $_POST["email"];
            $password = $_POST["password"];


            $stmt = $conn->prepare("INSERT INTO demo.demo_table (username, age, dob, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sisss", $username, $age, $dob, $email, $password);
            $stmt->execute();

            }
            else
            {
                $user = null;
                echo "no username supplied";
            }
    }
    $stmt->close();
} else {
    // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$conn->close();


// How to show alert that username already exists.



?>