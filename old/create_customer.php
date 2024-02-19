<?php
    session_start();

    if (!isset($_SESSION["logged_in"])) {
        header("Location: index.php");
    }

    $conn = new mysqli("localhost", "root", "", "inventory_db");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $code = $_POST['code'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    
    $sql1 = "INSERT INTO customer (code, firstname, lastname, contact) VALUES ('$code', '$firstname', '$lastname', '$contact')";
    $result1 = $conn->query($sql1);
    
    if ($result1) {
        $sql2 = "SELECT * FROM customer WHERE code='$code'";
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $id = $row['id'];
        $_SESSION['customer_creation_success'] = true;
        header("Location: view_customer.php?id=$id");
        exit();
    } else {
        //echo "Error: $conn->error";
        $_SESSION['code_taken'] = true;
        header("Location: new_customer.php");
        exit();
    }
    
    $conn->close();
?>