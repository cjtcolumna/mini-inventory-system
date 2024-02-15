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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $sql = "INSERT INTO user (email, password, firstname, lastname) VALUES ('$email', '$password', '$firstname', '$lastname')";
    $result = $conn->query($sql);
    
    if ($result) {
        header("Location: users.php");
        exit();
    } else {
        echo "Error: $conn->error";
        header("Location: users.php");
        exit();
    }
    
    $conn->close();
?>