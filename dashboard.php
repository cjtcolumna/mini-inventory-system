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
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
</head>

<body>
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

    <nav class="p-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa-solid fa-house"></i><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col my-5">
                <div class="d-flex justify-content-center align-items-center mx-auto total new">
                    <div class="text-center">
                        <p class="h1 p-0 m-0 total-number">100</p>
                        <p class="h6 p-0 m-0 total-name">NEW</p>
                    </div>
                </div>
                <div class="d-block mt-5 pb-1 card-lg new">
                    <p class="h5 m-0 pt-3 ps-3 total-name">New</p>
                    <div class="p-2 m-3 card-sm card-new">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-new">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-new">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-new">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                </div>
            </div>
            <div class="col my-5">
                <div class="d-flex justify-content-center align-items-center mx-auto total qualified">
                    <div class="text-center">
                        <p class="h1 p-0 m-0 total-number">20</p>
                        <p class="h6 p-0 m-0 total-name">QUALIFIED</p>
                    </div>
                </div>

                <div class="d-block mt-5 pb-1 card-lg qualified">
                    <p class="h5 m-0 pt-3 ps-3 total-name">Qualified</p>
                    <div class="p-2 m-3 card-sm card-qualified">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-qualified">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-qualified">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-qualified">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                </div>
            </div>
            <div class="col my-5">
                <div class="d-flex justify-content-center align-items-center mx-auto total demo">
                    <div class="text-center">
                        <p class="h1 p-0 m-0 total-number">20</p>
                        <p class="h6 p-0 m-0 total-name">DEMO</p>
                    </div>
                </div>

                <div class="d-block mt-5 pb-1 card-lg demo demo-hover">
                    <p class="h5 m-0 pt-3 ps-3 total-name">Demo</p>
                    <div class="p-2 m-3 card-sm card-demo">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-demo">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-demo">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-demo">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                </div>
            </div>
            <div class="col my-5">
                <div class="d-flex justify-content-center align-items-center mx-auto total quoted">
                    <div class="text-center">
                        <p class="h1 p-0 m-0 total-number">50</p>
                        <p class="h6 p-0 m-0 total-name">QUOTED</p>
                    </div>
                </div>

                <div class="d-block mt-5 pb-1 card-lg quoted">
                    <p class="h5 m-0 pt-3 ps-3 total-name">Quoted</p>
                    <div class="p-2 m-3 card-sm card-quoted">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-quoted">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-quoted">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-quoted">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                </div>
            </div>
            <div class="col my-5">
                <div class="d-flex justify-content-center align-items-center mx-auto total deal">
                    <div class="text-center">
                        <p class="h1 p-0 m-0 total-number">1000</p>
                        <p class="h6 p-0 m-0 total-name">DEAL</p>
                    </div>
                </div>

                <div class="d-block mt-5 pb-1 card-lg deal">
                    <p class="h5 m-0 pt-3 ps-3 total-name">Deal</p>
                    <div class="p-2 m-3 card-sm card-deal">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-deal">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-deal">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                    <div class="p-2 m-3 card-sm card-deal">
                        <p class="m-0">JUAN Dela Cruz</p>
                        <p class="text-end h5 m-0 py-1">10,000.00</p>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>