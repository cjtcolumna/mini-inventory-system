<?php
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
}

$conn = new mysqli("localhost", "root", "", "inventory_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];
$_SESSION["selected_customer_id"] = $id;
if (isset($_GET['success'])) {
}

$sql = "SELECT * FROM customer WHERE id=$id";
$result = $conn->query($sql);


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $code = $row['code'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $contact = $row['contact'];
} else {
    header("Location: customers.php");
}

$conn->close();
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
    <title>View User</title>
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
                        <a class="nav-link" href="customers.php">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="materials.php">Materials</a>
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
            <li class="breadcrumb-item"><a class="breadcrumb-custom-link" href="users.php">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>
    <!-- Breadcrumbs end -->

    <div class="container-fluid p-5">
        <div id="customer-alert-box" class="alert alert-danger alert-dismissible fade show d-none-custom" role="alert">
            <strong id="customer-alert-text">Code already taken!</strong> Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="customer-success-alert-box" class="alert alert-success alert-dismissible fade show d-none-custom" role="alert">
            <strong>Well Done! </strong><span id="customer-success-alert-text">User account successfully created.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="new-user-container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <p class="h4">Customer Info</p>
                <a class="btn btn-sm btn-secondary btn-user-custom" href="customers.php">Back to list</a>
            </div>
            <hr>
            <div class="d-flex flex-row">
                <div class="nav-left-custom mt-3">
                    <a id="customer-nav-selected" class="nav-left-options nav-left-options-active" onclick="optionSelected(this)" onmouseover="addHoverEffects(this)" onmouseout="removeHoverEffects(this)">Profile Settings</a>
                    <a class="nav-left-options" onclick="optionSelected(this)" onmouseover="addHoverEffects(this)" onmouseout="removeHoverEffects(this)">Customer Data</a>
                </div>
                <div id="customer-profile-settings-tab" class="container-fluid mt-3 tab-right-custom profile-settings-tab display-block">
                    <p class="h5">Profile Settings</p>

                    <form class="d-block mx-auto user-from-custom" action="update_customer.php" method="post">
                        <div>
                            <label for="customer-input-code" class="form-label">Code</label>
                            <input id="customer-input-code" class="form-control mb-3" type="text" name="code" value="<?php echo $code ?>" required>
                        </div>
                        <div>
                            <label for="customer-input-firstname" class="form-label">First Name</label>
                            <input id="customer-input-firstname" class="form-control mb-3" type="text" name="firstname" value="<?php echo $firstname ?>" required>
                        </div>
                        <div>
                            <label for="customer-input-lastname" class="form-label">Last Name</label>
                            <input id="customer-lastname" class="form-control mb-3" type="text" name="lastname" value="<?php echo $lastname ?>" required>
                        </div>
                        <div>
                            <label for="customer-input-contact" class="form-label">Contact</label>
                            <input id="customer-input-contact" class="form-control mb-3" type="text" name="contact" value="<?php echo $contact ?>" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary m-3 btn-user-custom" type="submit" name="update_info">Save</button>
                            <a class="btn btn-secondary ms-0 m-3 btn-user-custom" href="customers.php">Cancel</a>
                        </div>
                    </form>
                </div>
                <div id="customer-data-tab" class="container-fluid mt-3 tab-right-custom account-settings-tab">
                    <p class="h5">Customer Data</p>
                    <form class="d-block mx-auto user-from-custom" action="delete_customer.php" method="post">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-warning-header-custom text-warning"><i class="fa-solid fa-triangle-exclamation"></i>Warning!</h4>
                            <p>Deleting this customer data may affect another record. Please make sure that you know what you are doing.</p>
                        </div>
                        <div>
                            <p class="m-0">Remove Customer Data</p>
                            <input id="input-checkbox-remove-account" class="form-check-input mb-3" type="checkbox" value="remove" required>
                            <label for="input-checkbox-remove-account" class="form-check-label">Delete this Customer Data?</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary m-3 btn-user-custom" type="submit">Yes, Delete</button>
                            <a class="btn btn-secondary ms-0 m-3 btn-user-custom" href="users.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
    <?php
    if (isset($_SESSION['code_taken'])) {
        echo '<script>
        document.getElementById("customer-alert-text").innerHTML = "Customer code already taken!";
        document.getElementById("customer-alert-box").style.display = "block";
        </script>';
        unset($_SESSION['code_taken']);
    }
    if (isset($_SESSION['customer_creation_success'])) {
        echo '<script>
        document.getElementById("customer-success-alert-box").style.display = "block";
        </script>';
        unset($_SESSION['customer_creation_success']);
    }
    if (isset($_SESSION['customer_data_update_success'])) {
        echo '<script>
        document.getElementById("customer-success-alert-box").style.display = "block";
        document.getElementById("customer-success-alert-text").innerHTML = "Customer data successfully updated.";
        </script>';
        unset($_SESSION['customer_data_update_success']);
    }
    ?>
</body>

</html>

<script>
    function optionSelected(element) {
        document.getElementById("customer-nav-selected").removeAttribute("id");
        element.id = "customer-nav-selected";
        if (element.innerHTML === "Profile Settings") {
            document.getElementById("customer-profile-settings-tab").classList.add("display-block");
            document.getElementById("customer-data-tab").classList.remove("display-block");
        }else if (element.innerHTML === "Customer Data") {
            document.getElementById("customer-profile-settings-tab").classList.remove("display-block");
            document.getElementById("customer-data-tab").classList.add("display-block");
        }
    }
    function addHoverEffects(element) {
        document.getElementById("customer-nav-selected").classList.remove("nav-left-options-active");
        element.classList.add("nav-left-options-active");
    }

    function removeHoverEffects(element) {
        element.classList.remove("nav-left-options-active");
        document.getElementById("customer-nav-selected").classList.add("nav-left-options-active");
    }
</script>