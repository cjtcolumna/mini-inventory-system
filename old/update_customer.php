<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
}

$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['selected_customer_id'];

$code = $_POST['code'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];

$sql = "UPDATE customer SET code='$code', firstname='$firstname', lastname='$lastname', contact='$contact' WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    $_SESSION['customer_data_update_success'] = true;
    header("Location: view_customer.php?id=$id&success=true");
    exit();
} else {
    $_SESSION['code_taken'] = true;
    header("Location: view_customer.php?id=$id&success=false");
    exit();
}

$conn->close();
