<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom_styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/white 2.png">
</head>
<style>
    .index {
    background-image: url("img/mountain\ 1.png");
    background-color: rgba(42, 48, 66, 1);
    background-size: cover;
    }

    .content {
    height: 100vh; /* Set height to 100 viewport height */
    width: 60vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    }

    .box {
    background-color: gainsboro;
    border-radius: 20px;
    width: 300px;
    height: 550px;
    }

    .myfooter {
    background-color: #0f212b;
    }
</style>
<body class="index">
    <div class="content container text-center text-white">
        <div class="d-flex flex-column" style="margin-left: -1100px;">
            <img src="img\white 2.png" alt="" style=" margin-top: -200px;">
            <img src="img\Laundry Express.png" alt="">
        </div>
        <div class="text-center">
            <h1>Solutions to solve clothing problems</h1>
            <p>Find a laundry express. choose a program, easy payment, your clothes are guaranteed to be clean and tidy
            </p><br>
        </div>
        <div class="row">
            <div class="col">
                <a href="sign_in.php" type="button" class="btn btn-dark btn-lg">Sign in</a>
            </div>
            <div class="col">
                <a href="register.php" type="button" class="btn btn-light btn-lg">Register</a>
            </div>
        </div>
    </div>
    <footer class="d-flex justify-content-between myfooter text-white">
        <div class="d-flex align-items-center p-4">
            2023 LaundryExpress. All rights reserved
        </div>
        <div class="d-flex align-items-center p-4">
            <div class="me-4">Privacy & Policy</div>
            <div>Terms & Conditions</div>
        </div>
    </footer>
</body>