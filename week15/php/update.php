<?php

$conn = mysqli_connect('localhost', 'root', '', 'final_exam');

$id = $_GET['id'];

if ($_POST) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    mysqli_query($conn, "update users set first_name = '{$firstName}', last_name = '{$lastName}' where id = $id");

    header('Location: list.php');
    exit();
}

$query = mysqli_query($conn, 'select * from users where id = ' . $id);
$user = mysqli_fetch_assoc($query);
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
        <input type="text" name="first_name" id="first_name" required value="<?= $user['first_name'] ?>">
    </div>
    <div>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required value="<?= $user['last_name'] ?>">
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>
