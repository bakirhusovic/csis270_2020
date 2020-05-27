<?php

session_start();

include('includes/db.php');

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = oci_parse($conn, "select * from users where username = :username and password = :password");
    oci_bind_by_name($query, ':username', $username);
    oci_bind_by_name($query, ':password', $password);
    oci_execute($query);
    var_dump(oci_error($query));

    $row = oci_fetch_assoc($query);

    if ($row) {
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['user_first_name'] = $row['FIRST_NAME'];
        $_SESSION['user_last_name'] = $row['LAST_NAME'];
        header('Location: index.php');
        exit();
    } else {
        die('Incorrect username and/or password');
    }

}
