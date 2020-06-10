<?php

$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'final_exam');

//mysqli_query($conn, 'delete from users where id = ' . $id);
mysqli_query($conn, 'update users set is_deleted = 1 where id = ' . $id);
header('Location: list.php');
exit();
