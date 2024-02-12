<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center h-100">
        <div class="card-login p-5">
            <p class="h1 text-center pb-5">Login</p>
            <form class="d-grid gap-2" action="login.php" method="post">
                <input class="form-control" type="email" name="email" placeholder="Email">
                <input class="form-control" type="password" name="password" placeholder="Password">
                <button class="btn btn-primary mt-3 mb-3" type="submit">Login</button>
                <p class="text-center mt-3">Not a member?<a class="sign-up-link" href="#"> FREE DEMO</a></p>
            </form>
        </div>
    </div>
</body>

</html>