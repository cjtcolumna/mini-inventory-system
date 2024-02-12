<?php
session_start();
session_unset();
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
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center h-100">
        <div class="card-login p-5">
            <p class="h1 text-center pb-5">Login</p>
            <form class="d-grid gap-2" action="login.php" method="post">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <button class="btn btn-primary mt-3 mb-3" type="submit">Login</button>
                <p class="text-center mt-3">Not a member?<a class="sign-up-link" href="#"> FREE TRIAL</a></p>
            </form>
        </div>
    </div>
</body>

</html>