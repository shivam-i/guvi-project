<?php
    session_start();

    require_once 'connection.php';

    if ( !isset($_POST['username'], $_POST['password']) ) {
        exit('Please fill both the username and password fields!');
    }

    if ($stmt = $conn->prepare('SELECT username, password FROM demo.demo_table WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            
            if ($_POST['password'] == $password) {
                // Verification success! User has logged-in!
                
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                

                echo '400';


                // if (isset($_SESSION['loggedin'])) {
                //     header('Location: ../profile.html');
                // }
            } else {
                // Incorrect password
                // echo "Incorrect Username/Password";
                echo '401';
                // header('Location: ../login.html');
            }
        } else {
            // Incorrect username
            echo '402';
            // echo "Incorrect Username/Password";
        }

        $stmt->close();
    }
?>
