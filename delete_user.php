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

$sql = "DELETE FROM user WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    header("Location: users.php?success=true");
    exit();
} else {
    echo "Error: $conn->error";
}


$conn->close();
