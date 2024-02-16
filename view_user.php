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
$_SESSION["selected_user_id"] = $id;
if (isset($_GET['success'])) {
}

$sql = "SELECT * FROM user WHERE id=$id";
$result = $conn->query($sql);


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
} else {
    header("Location: users.php");
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
            <li class="breadcrumb-item"><a class="breadcrumb-custom-link" href="users.php">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>
    <!-- Breadcrumbs end -->

    <div class="container-fluid p-5">
        <div id="custom-alert-box" class="alert alert-danger alert-dismissible fade show d-none-custom" role="alert">
            <strong id="custom-alert-text">Password does not match!</strong> Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="custom-success-alert-box" class="alert alert-success alert-dismissible fade show d-none-custom" role="alert">
            <strong>Well Done! </strong><span id="custom-success-alert-text">User account successfully created.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="new-user-container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <p class="h4">User Info</p>
                <a class="btn btn-sm btn-secondary btn-user-custom" href="users.php">Back to list</a>
            </div>
            <hr>
            <div class="d-flex flex-row">
                <div class="nav-left-custom mt-3">
                    <a id="selected" class="nav-left-options nav-left-options-active" onclick="optionSelected(this)" onmouseover="addHoverEffects(this)" onmouseout="removeHoverEffects(this)">Profile Settings</a>
                    <a class="nav-left-options" onclick="optionSelected(this)" onmouseover="addHoverEffects(this)" onmouseout="removeHoverEffects(this)">Change Password</a>
                    <a class="nav-left-options" onclick="optionSelected(this)" onmouseover="addHoverEffects(this)" onmouseout="removeHoverEffects(this)">Account Settings</a>
                </div>
                <div id="profile-settings-tab" class="container-fluid mt-3 tab-right-custom profile-settings-tab display-block">
                    <p class="h5">Profile Settings</p>

                    <form class="d-block mx-auto user-from-custom" action="update_user.php" method="post">
                        <div>
                            <label for="input-firstname" class="form-label">First Name</label>
                            <input id="input-firstname" class="form-control mb-3" type="text" name="firstname" value="<?php echo $firstname ?>" required>
                        </div>
                        <div>
                            <label for="input-lastname" class="form-label">Last Name</label>
                            <input id="input-lastname" class="form-control mb-3" type="text" name="lastname" value="<?php echo $lastname ?>" required>
                        </div>
                        <div>
                            <label for="input-email" class="form-label">Email</label>
                            <input id="input-email" class="form-control mb-3" type="email" name="email" value="<?php echo $email ?>" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary m-3 btn-user-custom" type="submit" name="update_info">Save</button>
                            <a class="btn btn-secondary ms-0 m-3 btn-user-custom" href="users.php">Cancel</a>
                        </div>
                    </form>
                </div>
                <div id="change-password-tab" class="container-fluid mt-3 tab-right-custom change-password-tab">
                    <p class="h5">Change Password</p>
                    <form class="d-block mx-auto user-from-custom" action="update_user.php" method="post">

                        <div>
                            <label for="input-password" class="form-label">New Password</label>
                            <input id="input-password" class="form-control mb-3" type="password" name="password" required>
                        </div>
                        <div>
                            <label for="input-confirm-password" class="form-label">Confirm New Password</label>
                            <input id="input-confirm-password" class="form-control mb-3" type="password" name="confirm_password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary m-3 btn-user-custom" type="submit" name="update_password">Save</button>
                            <a class="btn btn-secondary ms-0 m-3 btn-user-custom" href="users.php">Cancel</a>
                        </div>
                    </form>
                </div>
                <div id="account-settings-tab" class="container-fluid mt-3 tab-right-custom account-settings-tab">
                    <p class="h5">Account Settings</p>
                    <form class="d-block mx-auto user-from-custom" action="delete_user.php" method="post">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-warning-header-custom text-warning"><i class="fa-solid fa-triangle-exclamation"></i>Warning!</h4>
                            <p>Deleting this account may affect another record. Please make sure that you know what you are doing.</p>
                        </div>
                        <div>
                            <p class="m-0">Remove Account</p>
                            <input id="input-checkbox-remove-account" class="form-check-input mb-3" type="checkbox" value="remove" required>
                            <label for="input-checkbox-remove-account" class="form-check-label">Delete this Account?</label>
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
    if (isset($_SESSION['email_taken'])) {
        echo '<script>
        document.getElementById("custom-alert-text").innerHTML = "Email already taken!";
        document.getElementById("custom-alert-box").style.display = "block";
        </script>';
        unset($_SESSION['email_taken']);
    }
    if (isset($_SESSION['password_does_not_match'])) {
        echo '<script>
        document.getElementById("custom-alert-text").innerHTML = "Password does not match!";
        document.getElementById("custom-alert-box").style.display = "block";
        </script>';
        unset($_SESSION['password_does_not_match']);
    }
    if (isset($_SESSION['user_creation_success'])) {
        echo '<script>
        document.getElementById("custom-success-alert-box").style.display = "block";
        </script>';
        unset($_SESSION['user_creation_success']);
    }
    if (isset($_SESSION['user_data_update_success'])) {
        echo '<script>
        document.getElementById("custom-success-alert-box").style.display = "block";
        document.getElementById("custom-success-alert-text").innerHTML = "User data successfully updated.";
        </script>';
        unset($_SESSION['user_data_update_success']);
    }
    if (isset($_SESSION['user_password_update_success'])) {
        echo '<script>
        document.getElementById("custom-success-alert-box").style.display = "block";
        document.getElementById("custom-success-alert-text").innerHTML = "User password successfully updated";
        </script>';
        unset($_SESSION['user_password_update_success']);
    }
    ?>
</body>

</html>

<script>
    function optionSelected(element) {
        document.getElementById("selected").removeAttribute("id");
        element.id = "selected";
        if (element.innerHTML === "Profile Settings") {
            document.getElementById("profile-settings-tab").classList.add("display-block");
            document.getElementById("change-password-tab").classList.remove("display-block");
            document.getElementById("account-settings-tab").classList.remove("display-block");
        } else if (element.innerHTML === "Change Password") {
            document.getElementById("profile-settings-tab").classList.remove("display-block");
            document.getElementById("change-password-tab").classList.add("display-block");
            document.getElementById("account-settings-tab").classList.remove("display-block");
        } else if (element.innerHTML === "Account Settings") {
            document.getElementById("profile-settings-tab").classList.remove("display-block");
            document.getElementById("change-password-tab").classList.remove("display-block");
            document.getElementById("account-settings-tab").classList.add("display-block");
        }
    }

    function addHoverEffects(element) {
        document.getElementById("selected").classList.remove("nav-left-options-active");
        element.classList.add("nav-left-options-active");
    }

    function removeHoverEffects(element) {

        element.classList.remove("nav-left-options-active");
        document.getElementById("selected").classList.add("nav-left-options-active");
    }
</script>