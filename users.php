<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Users</title>
</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark ps-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Mini Inventory System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item last">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Breadcrumbs start -->
    <nav class="p-3 custom-color" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa-solid fa-house"></i><a class="breadcrumb-custom-link" href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>
    <!-- Breadcrumbs end -->

    <div class="container-fluid p-5">
        <div class="table-container-custom">
            <div class="d-flex justify-content-between align-items-center">
            <p class="h4">Users</p>
            <a class="btn btn-sm btn-primary btn-user-custom" href="new_user.php">Add</a>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "inventory_db");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class=\"tr-hover-custom\" onclick=\"handleRowClick(this)\">
                                <th scope=\"row\">" . $row["id"] . "</th>
                                <td>" . $row["firstname"] . "</td>
                                <td>" . $row["lastname"] . "</td>
                                <td>" . $row["email"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    $conn->close();

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<script>
    function handleRowClick(row) {
        window.location.href = "view_user.php";
    }
</script>