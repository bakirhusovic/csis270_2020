<?php

if ($_POST) {
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_exam');

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    mysqli_query($conn, "insert into users (first_name, last_name) values ('{$firstName}', '{$lastName}')");
    $_SESSION['msg'] = "New user is saved";
    header('Location: list.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <div>
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required>
    </div>
    <div>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
