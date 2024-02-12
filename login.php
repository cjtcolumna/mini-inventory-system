<?php
session_start();

$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($_POST["email"] === $row["email"] && $_POST["password"] === $row["password"]) {
            $_SESSION["logged_in"] = TRUE;
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["firstname"] = $row["firstname"];
            $_SESSION["lastname"] = $row["lastname"];
            break;
        }
    }

    if($_SESSION["logged_in"]) {
        header("Location: dashboard.php");
        exit();
    }else{
        header("Location: index.php");
        exit();
    }
} else {
    echo "0 results";
}

$conn->close();
