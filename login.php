<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["USER"])) {
    header("Location: admin.php");
}
if (isset($_POST["submit"])) {
    $con = "mysql:dbname=tdw_php;host=127.0.0.1;";
    try {
        $exec = new PDO($con, "root", "");
    } catch (PDOException $e) {
        printf("error");
        exit();
    }
    $query = "SELECT * FROM utilisateur ";
    if ($_POST["uname"] == "admin" && $_POST["psw"] == "admin") {

        $_SESSION["USER"] = "admin";
        header("Location: admin.php");
    } else {
        echo "<script>alert(\"wrong username/password combination\")</script>";
    };
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css?v=1">
    <title>Document</title>
</head>

<body>

    <div class="form-container">
        <form action="login.php" method="post">
            <h2>Login Form</h2>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <input type="submit" name="submit" class="btn" />

            </div>


        </form>
    </div>


</body>

</html>