<?php
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];

    $query = oci_parse($conn, "insert into categories (title) values ('{$title}')");
    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
