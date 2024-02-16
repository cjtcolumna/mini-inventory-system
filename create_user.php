<?php
    session_start();

    if (!isset($_SESSION["logged_in"])) {
        header("Location: index.php");
    }

    $conn = new mysqli("localhost", "root", "", "inventory_db");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $sql1 = "INSERT INTO user (email, password, firstname, lastname) VALUES ('$email', '$hashed_password', '$firstname', '$lastname')";
    $result1 = $conn->query($sql1);
    
    if ($result1) {
        $sql2 = "SELECT * FROM user WHERE email='$email'";
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $id = $row['id'];
        $_SESSION['user_creation_success'] = true;
        header("Location: view_user.php?id=$id");
        exit();
    } else {
        //echo "Error: $conn->error";
        $_SESSION['email_taken'] = true;
        header("Location: new_user.php");
        exit();
    }
    
    $conn->close();
?>