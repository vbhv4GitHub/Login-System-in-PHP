<?php

    $login = false;
    $danger = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require 'partials/_dbconnect.php';
        

        $username = $_POST['username'];
        $password = $_POST['password'];
  
        //   $sql = "Select * from `users` where `username`='$username' and `password`='$password'";
        // ! Implementing password hashing verification.
        $sql = "Select * from `users` where `username`='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){    $login = true;
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php"); // ! This function is used to redirect in PHP
            }
            else{
                $danger = true;
                }
            }
        }
        else{
            $danger = true;
        }
    }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <?php
    
    require 'partials/_nav.php'; // Imports bootstrap navbar
    
    ?>
    <?php

        if($login){
        
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>You are logged in!!!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if($danger){
        
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!!!</strong> Invalid login credentials.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="container">
        <h1 class="text-center mt-3 ">Singup to our Website</h1>
        <form action="/php/login/login.php" method="post">
            <div class="mb-3 col-md-6"> 
            <!-- col-md-6 makes the tag smaller. -->
                <label for="username" class="form-label">Enter a Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Enter Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary col-md-6">Login</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>