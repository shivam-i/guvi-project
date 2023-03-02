<?php
require_once 'connection.php';
if ($stmt = $conn->prepare('SELECT username, password FROM demo.demo_table WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'Username exists, please choose another!';
    } else {
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
    echo 'Could not prepare statement!';
}
$conn->close();



?>
