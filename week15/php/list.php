<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'final_exam');

$query = mysqli_query($conn, 'select * from users where is_deleted = 0');
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
    <?php if(isset($_SESSION['msg'])): ?>
        <?= $_SESSION['msg'] ?>
    <?php
        unset($_SESSION['msg']);
    endif ?>
    <table>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <!-- INSERT YOUR CODE HERE -->
        <?php while($row = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><a href="update.php?id=<?= $row['id'] ?>">Edit</a></td>
            <td><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
