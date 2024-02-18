<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
}

$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['selected_user_id'];

if (isset($_POST['update_info'])) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "UPDATE user SET email='$email', firstname='$firstname', lastname='$lastname' WHERE id=$id";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['user_data_update_success'] = true;
        header("Location: view_user.php?id=$id&success=true");
        exit();
    } else {
        $_SESSION['email_taken'] = true;
        header("Location: view_user.php?id=$id&success=false");
        exit();
    }
}elseif (isset($_POST['update_password'])) {
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);
    $confirm_password = $_POST['confirm_password'];

    if($password === $confirm_password) {
        $sql = "UPDATE user SET password='$hashed_password' WHERE id=$id";
        $result = $conn->query($sql);

        if ($result) {
            $_SESSION['user_password_update_success'] = true;
            header("Location: view_user.php?id=$id&success=true");
            exit();
        } else {
            echo "Error: $conn->error";
        }


    }else{
        $_SESSION['password_does_not_match'] = true;
        header("Location: view_user.php?id=$id&success=false");
        exit();
    }

}


$conn->close();
